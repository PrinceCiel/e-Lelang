<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $fillable = ['nama', 'slug'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
