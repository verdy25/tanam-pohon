<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    protected $table = 'pengambilans';
    protected $guarded = [];
    public $timestamps = false;

    public function permintaan(){
        return $this->belongsTo('App\Permintaan', 'permintaan_id');
    }

}
