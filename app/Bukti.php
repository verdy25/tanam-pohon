<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    protected $table = 'buktis';
    protected $guarded = [];

    public function permintaan(){
        return $this->belongsTo('App\Permintaan', 'permintaan_id');
    }
}
