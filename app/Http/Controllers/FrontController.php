<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Kategori;
use App\Models\Lelang;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('frontend', compact('kategori'));
    }

    public function show(string $slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        return view('kategori', compact('kategori'));
    }
    public function search(Request $request)
    {
        $katakunci = $request->search;
        if (!$katakunci) {
            toast('Masukkan kata kunci pencarian.', 'error');
            return redirect()->back();
        }

        $hasil = Lelang::whereHas('barang', function ($query) use ($katakunci) {
        $query->where('nama', 'like', '%' . $katakunci . '%')
              ->orWhereHas('kategori', function ($q) use ($katakunci) {
                  $q->where('nama', 'like', '%' . $katakunci . '%');
              });
        })->with('barang.kategori')->where('status', 'dibuka')->get();

        if ($hasil->isEmpty()) {
            toast('Tidak ada hasil.', 'warning');
            return redirect()->back();
            
        }
        foreach($hasil as $lelang){
            $bid = Bid::where('id_lelang', $lelang->id)->get();
            $TotalBidUser = $bid->sum(function($item) {
                return $item->bid;
            });
            $TotalBid = $lelang->barang->harga + $TotalBidUser;
        }
        return view('hasil', compact('hasil', 'katakunci', 'TotalBid'));
    }
}
