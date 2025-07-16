<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Struk;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $lelangjadwal = Lelang::where('status', 'ditutup')->get();
        $lelangberes = Lelang::where('status', 'selesai')->get();
        $transaksiberes = Struk::where('status', 'berhasil')->get();
        $totaltransaksi = $transaksiberes->count();
        $totalberes = $lelangberes->count();
        $totaljadwal = $lelangjadwal->count();
        $totalbarang = $barang->count();
        return view('backend', compact('totalbarang', 'totalberes', 'totaljadwal', 'totaltransaksi'));
    }
}
