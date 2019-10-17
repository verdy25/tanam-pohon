<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = "konsultasis";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function kondisi(){
        return $this->belongsTo('App\LahanKondisi');
    }
}
