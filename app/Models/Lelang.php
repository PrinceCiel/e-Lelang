<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    public $fillable = ['id_barang','jadwal_mulai','jadwal_berakhir','status'];

    public function pemenang()
    {
        return $this->hasOne(Pemenang::class);
    }

    public function bid()
    {
        return $this->hasOne(Bid::class);
    }

    public function struk()
    {
        return $this->hasOne(Struk::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
