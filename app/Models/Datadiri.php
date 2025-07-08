<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datadiri extends Model
{
    public $fillable = ['id_user','tanggal_lahir', 'foto_dokumen', 'alamat'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
