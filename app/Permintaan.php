<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $fillable = [
        'penanggungjawab',
        'alamat',
        'nik',
        'telp',
        'tujuan',
        'bibit_id',
        'jumlah_bibit',
        'luas_lahan',
        'status',
        'ktp',
        'spptpbb',
        'permohonan'
    ];

    public function bibit(){
        return $this->belongsTo('App\Bibit', 'bibit_id');
    }

    public function statuspengajuan(){
        return $this->belongsTo('App\StatusPengajuan', 'status');
    }
}
