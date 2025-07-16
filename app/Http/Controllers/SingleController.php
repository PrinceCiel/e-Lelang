<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Bid;
use App\Models\Lelang;
use App\Models\Pemenang;
use App\Models\Struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\MidtransService;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;


class SingleController extends Controller
{
    
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $pemenang = Pemenang::where('id_user', $user_id)->get();
        $lelang = Lelang::whereIn('id', function($query) use ($user_id) {
            $query->select('id_lelang')
              ->from('pemenangs')
              ->where('id_user', $user_id);
        })->with(['barang', 'struk', 'pemenang'])->get();
        // $struk = Struk::where('id_user', $pemenang->id_user);
        return view('order', compact('lelang'));
    }

    public function checkStatus(string $kode)
{
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$clientKey = config('services.midtrans.client_key');
    Config::$isProduction = config('services.midtrans.isProduction');

    // Ambil struk berdasarkan kode
    $struk = Struk::where('kode_struk', $kode)->firstOrFail();
    $order_id = $struk->kode_struk;

    try {
        // Memeriksa status transaksi
        $status = Transaction::status($order_id);

        // Memperbarui status struk berdasarkan status transaksi
        if ($status->transaction_status == 'settlement' || $status->transaction_status == 'capture') {
            $struk->status = 'berhasil';
            $struk->save();
            toast('Pembayaran berhasil dikonfirmasi!', 'success');
        } elseif ($status->transaction_status == 'pending') {
            toast('Pembayaran masih pending.', 'info');
        } else {
            toast('Pembayaran gagal/expired.', 'error');
        }

        return redirect()->back();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function struk(string $kodestruk)
    {
        $struk = Struk::where('kode_struk', $kodestruk)->first();
        $pemenang = Pemenang::findOrFail($struk->id_pemenang);
        // Hitung total
        $bidakhir = $pemenang->bid + $struk->lelang->barang->harga;
        $adminfee = $bidakhir * 0.05;
        $total = $adminfee + $bidakhir;

        // Bikin Snap Token
        if (!$struk->snap_token) {
            $params = [
                'transaction_details' => [
                    'order_id' => $struk->kode_struk,
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'first_name' => $pemenang->user->nama_lengkap,
                    'email' => $pemenang->user->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            $struk->snap_token = $snapToken;
            $struk->save();
        } else {
            $snapToken = $struk->snap_token;
        }

        return view('struk', compact('struk', 'pemenang', 'snapToken'));
    }

    public function show(string $kode)
    {
        $lelang = Lelang::where('kode_lelang', $kode)->first();
        $bid = Bid::where('id_lelang', $lelang->id)->get();
        $countBid = $bid->count();
        $TotalBid = $bid->sum(function($item) {
            return $item->bid;
        });
        $title = 'Membeli Item?';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        $hargaTerbaru = $lelang->barang->harga + $TotalBid;
        return view('single', compact('lelang', 'bid', 'hargaTerbaru', 'countBid'));
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->status == 'Terverifikasi'){
                $request->validate([
                    'bid' => 'required',
                ]);
                $lelang = Lelang::where('kode_lelang', $request->kode_lelang)->first();
                $bid = new Bid();
                $bid->id_lelang = $lelang->id;
                $bid->id_user = Auth::user()->id;
                $bid->bid = $request->bid;
                $bid->save();
                return redirect()->route('lelang.show', $request->kode_lelang);
            } elseif(Auth::user()->status == 'Belum Verifikasi'){
                return redirect()->route('verifikasi.index');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
