<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function show(string $slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        $lelang = Lelang::findOrFail($barang->id);
        return view('single', compact('lelang'));
    }
}
