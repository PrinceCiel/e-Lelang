<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    public $fillable = ['id_lelang','id_barang', 'id_pemenang', 'total', 'status', 'kode_unik','kode_struk', 'tgl_trx'];

    public function lelang()
    {
        return $this->belongsTo(lelang::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pemenang()
    {
        return $this->belongsTo(Pemenang::class);
    }
}
