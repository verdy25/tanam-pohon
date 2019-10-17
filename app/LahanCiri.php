<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LahanCiri extends Model
{
    protected $table = 'lahan_ciris';
    protected $fillable = ['ciri', 'pertanyaan', 'bobot'];

    public function kondisi(){
        return $this->belongsToMany('App\LahanKondisi');
    }
}
