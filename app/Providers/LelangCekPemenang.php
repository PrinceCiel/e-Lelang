<?php

namespace App\Providers;

use App\Models\Lelang;  
use App\Models\Pemenang;
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
                }
            }
        });
    }
}
