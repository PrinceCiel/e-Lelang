<?php

namespace App\Http\Controllers;

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
}
