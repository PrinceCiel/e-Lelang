<?php

use App\Http\Controllers\Backend\BarangController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\LelangController;
use App\Http\Controllers\Backend\PemenangController;
use App\Http\Controllers\Backend\ReviewBidController;
use App\Http\Controllers\Backend\StrukController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SingleController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('home');

Auth::routes();
Route::get('kategori/{slug}', [FrontController::class, 'show'])->name('kategori.show');
Route::get('/lelang/{slug}', [SingleController::class, 'show'])->name('single.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','as' => 'backend.','middleware'=>['auth', IsAdmin::class]], function(){
    Route::get('/', [BackendController::class, 'index'])->name('home');
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('lelang', LelangController::class);
    Route::resource('struk', StrukController::class);
    Route::resource('bid', ReviewBidController::class);
    Route::get('pemenang', [PemenangController::class, 'index'])->name('pemenang');
});