<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LahanKondisi extends Model
{
    protected $table = 'lahan_kondisis';
    protected $guarded = [] ;

    public function ciri(){
        return $this->belongsToMany('App\LahanCiri');
    }

    public function konsultasi(){
        return $this->hasMany('App\Konsultasi');
    }
}
