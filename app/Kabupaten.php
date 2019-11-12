<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'indonesia_cities';

    public function profile(){
        return $this->hasMany('App\Masyarakat', 'kabupaten_id');
    }
}
