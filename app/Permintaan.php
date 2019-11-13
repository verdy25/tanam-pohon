<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaans';
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
        'latitude',
        'longitude',
        'user_id',
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

    public function bukti(){
        return $this->hasMany('App\Bukti', 'permintaan_id');
    }

    public function masyarakat(){
        return $this->belongsTo('App\Masyarakat', 'user_id');
    }

    public function pengambilan(){
        return $this->hasOne('App\Pengambilan', 'permintaan_id');
    }
}
