<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakats';
    protected $guarded = [];

    public function provinsi(){
        return $this->belongsTo('App\Provinsi', 'provinsi_id');
    }

    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten', 'kabupaten_id');
    }

    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
    }

    public function permintaan(){
        return $this->hasMany('App\Permintaan', 'user_id');
    }
}
