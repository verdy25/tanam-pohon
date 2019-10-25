<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LahanKondisi extends Model
{
    protected $table = 'lahan_kondisis';
    protected $guarded = [] ;

    public $timestamps = false;

    public function detail_kondisi(){
        return $this->hasMany('App\LahanKondisiDetail', 'lahan_kondisi_id');
    }
}
