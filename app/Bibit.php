<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    protected $guarded = [];

    public function permintaan(){
        return $this->hasMany('App\Permintaan', 'bibit_id');
    }
}
