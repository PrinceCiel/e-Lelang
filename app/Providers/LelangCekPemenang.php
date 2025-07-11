<?php

namespace App\Providers;
use Str;
use App\Models\Lelang;  
use App\Models\Pemenang;
use App\Models\Struk;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class LelangCekPemenang extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Jalan di setiap request, auto check lelang yang udah berakhir
        View::composer('*', function () {
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

            $lelangBerakhir = Lelang::where('jadwal_berakhir', '<=', Carbon::now())
                ->whereDoesntHave('pemenang') // pastikan belum ada pemenang
                ->with('bid')
                ->get();

            foreach ($lelangBerakhir as $lelang) {
                $pemenang = $lelang->bid()
                    ->orderByDesc('bid') // pastikan 'bid' adalah kolom nilai
                    ->orderByDesc('created_at')
                    ->first();
                if ($pemenang) {
                    Pemenang::create([
                        'id_lelang' => $lelang->id,
                        'id_user'   => $pemenang->id_user,
                        'bid'       => $pemenang->bid, 
                    ]);
                    // generate kode lelang: L + 6 huruf random kapital
                    $kodeStruk = 'STRL-' . Str::upper(Str::random(10));

                    // cek biar gak duplikat (kecil kemungkinan sih, tapi tetep aman)
                    while (Struk::where('kode_struk', $kodeStruk)->exists()) {
                        $kodeStruk = 'STRL-' . Str::upper(Str::random(10));
                    }
                    Struk::create([
                        'id_lelang'   => $lelang->id,
                        'id_barang'   => $lelang->id_barang,
                        'id_pemenang' => $pemenang->id_user,
                        'total'       => $pemenang->bid,
                        'status'      => 'belum dibayar',
                        'kode_unik'   => null,
                        'tgl_trx'     => now(),
                        'kode_struk'  => $kodeStruk,
                    ]);
                }
            }
        });
    }
}
