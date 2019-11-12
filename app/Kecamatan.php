<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'indonesia_districts';

    public function profile(){
        return $this->hasMany('App\Masyarakat', 'kecamatan_id');
    }
}
