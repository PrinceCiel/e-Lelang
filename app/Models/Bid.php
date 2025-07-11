<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public $fillable = ['id_lelang','id_user', 'bid'];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
