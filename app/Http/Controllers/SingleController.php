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

    public function show(string $kode)
    {
        $lelang = Lelang::where('kode_lelang', $kode)->first();
        $bid = Bid::where('id_lelang', $lelang->id)->latest()->get();
        $bidtertinggi = Bid::where('id_lelang', $lelang->id)->max('bid');
        if(! $bidtertinggi){
            $bidtertinggi = $lelang->barang->harga;
        }
        $countBid = $bid->count();
        $TotalBid = $bid->sum(function($item) {
            return $item->bid;
        });
        $title = 'Membeli Item?';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        return view('single', compact('bidtertinggi','lelang', 'bid', 'countBid'));
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
