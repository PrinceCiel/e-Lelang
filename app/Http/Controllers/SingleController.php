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

class SingleController extends Controller
{
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

    public function struk(string $kodestruk)
    {
        $struk = Struk::where('kode_struk', $kodestruk)->first();
        $pemenang = Pemenang::findOrFail($struk->id_pemenang);
        return view('struk', compact('struk', 'pemenang'));
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
        } else {
            return redirect()->route('login');
        }
    }
}
