<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LahanKondisiDetail extends Model
{
    protected $table = 'lahan_kondisi_detail';
    protected $fillable = ['lahan_kondisi_id', 'lahan_ciri_id'];
     public $timestamps = false;

    public function kondisilahan(){
        return $this->belongsTo('App\LahanKondisi', 'lahan_kondisi_id');
    }

    public function cirilahan(){
        return $this->belongsTo('App\LahanCiri', 'lahan_ciri_id');
    }
}
