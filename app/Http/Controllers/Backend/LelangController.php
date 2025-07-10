<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lelangs = Lelang::latest()->get();

        foreach($lelangs as $lelang){
            $now = now();
            if($now->lt($lelang->jadwal_mulai)) {
                $status = 'ditutup';
            } elseif($now->between($lelang->jadwal_mulai, $lelang->jadwal_berakhir)){
                $status = 'dibuka';
            } else {
                $status = 'selesai';
            }

            if($lelang->status !== $status){
                $lelang->status = $status;
                $lelang->save();
            }
        }

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        return view('lelang.index', compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::where('jumlah', '!=',0)->get();
        return view('lelang.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jadwal_mulai' => 'required',
            'jadwal_berakhir' => 'required'
        ]);

        $lelang = new Lelang();
        $lelang->id_barang = $request->id_barang;
        $lelang->jadwal_mulai = $request->jadwal_mulai;
        $lelang->jadwal_berakhir = $request->jadwal_berakhir;

        $barang = Barang::findOrFail($request->id_barang);
        $jumlah = $barang->jumlah - 1;
        $barang->jumlah = $jumlah;
        $barang->save();
        $lelang->save();

        toast('Data berhasil disimpan', 'success');
        return redirect()->route('backend.lelang.index');
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
        $barang = Barang::where('jumlah', '!=',0)->get();
        $lelang = Lelang::findOrFail($id);
        $oldbarang = Barang::where('id',$lelang->id_barang)->first();
        return view('lelang.edit', compact('lelang', 'barang', 'oldbarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'jadwal_mulai' => 'required',
            'jadwal_berakhir' => 'required'
        ]);
        $lelang = Lelang::findOrFail($id);
        if($lelang->id_barang !== $request->id_barang)
        {
            $baranglama = Barang::findOrFail($lelang->id_barang);
            $jumlahbaranglama = $baranglama->jumlah + 1;
            $baranglama->jumlah = $jumlahbaranglama;
            $baranglama->save();

            $barang = Barang::findOrFail($request->id_barang);
            $jumlah = $barang->jumlah - 1;
            $barang->jumlah = $jumlah;
            $barang->save();
        }

        $lelang->id_barang = $request->id_barang;
        $lelang->jadwal_mulai = $request->jadwal_mulai;
        $lelang->jadwal_berakhir = $request->jadwal_berakhir;
        $lelang->save();

        toast('Data berhasil disimpan', 'success');
        return redirect()->route('backend.lelang.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lelang = Lelang::findOrFail($id);
        $lelang->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('backend.lelang.index');
    }
}
