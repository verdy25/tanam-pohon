<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use App\LahanCiri;
use App\LahanKondisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    public function riwayat(){
        $konsultasi = Konsultasi::where('user_id', Auth::user()->id);
        return view('user.konsultasi.riwayat', compact('konsultasi'));
    }

    public function index(){
        $ciri = LahanCiri::orderBy('ciri', 'asc')->get();
        $kondisi = LahanKondisi::all();
        return view('user.konsultasi.index', compact('kondisi', 'ciri'));
    }

    public function store(Request $request){
        
    }

}
