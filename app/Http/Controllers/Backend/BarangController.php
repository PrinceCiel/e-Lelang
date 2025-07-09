<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Str;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        $kategori = Kategori::all();
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        return view('barang.index', compact('barangs','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:barangs',
            'jenis_barang' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kondisi' => 'required',
            'foto' => 'required'
        ]);
        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->id_kategori = $request->kategori;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        $barang->deskripsi = $request->deskripsi;
        $barang->kondisi = $request->kondisi;
        $barang->slug = Str::slug($request->nama, '-');

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('barangs', $randomName, 'public');
            // memasukan nama image nya ke database
            $barang->foto = $path;
        }
        $barang->save();
        toast('Data berhasil disimpan', 'success');
        return redirect()->route('backend.barang.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('backend.barang.index');
    }
}
