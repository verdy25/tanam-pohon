<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'indonesia_provinces';

    public function profile(){
        return $this->hasMany('App\Masyarakat', 'provinsi_id');
    }
}
