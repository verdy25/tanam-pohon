<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    protected $guarded = [];

    public function permintaan(){
        return $this->hasMany('App\Permintaan', 'status');
    }
}
