<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Barang;
use App\Models\Bid;
use App\Models\Lelang;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function index()
    {

    }
    public function show(string $kode)
    {
        $lelang = Lelang::where('kode_lelang', $kode)->first();
        $bid = Bid::where('id_lelang', $lelang->id)->get();
        $TotalBid = $bid->sum(function($item) {
            return $item->bid;
        });
        $title = 'Membeli Item?';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        $hargaTerbaru = $lelang->barang->harga + $TotalBid;
        return view('single', compact('lelang', 'bid', 'hargaTerbaru'));
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
