<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LahanCiri extends Model
{
    protected $table = 'lahan_ciris';
    protected $fillable = ['ciri', 'kategori_id', 'bobot'];

    public $timestamps = false;

    public function detail_kondisi(){
        return $this->hasMany('App\LahanKondisiDetail', 'lahan_ciri_id');
    }
}
