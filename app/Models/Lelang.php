<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    public $fillable = ['id_barang','jadwal_mulai','jadwal_berakhir','status', 'kode_lelang'];

    public function pemenang()
    {
        return $this->hasOne(Pemenang::class, 'id_lelang');
    }

    public function bid()
    {
        return $this->hasMany(Bid::class, 'id_lelang');
    }

    public function struk()
    {
    return $this->hasOne(Struk::class, 'id_lelang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
