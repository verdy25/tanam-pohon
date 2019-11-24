<?php

namespace App\Http\Controllers;

use App\Bibit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Permintaan;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function dataDashboard()
    { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permintaan = Permintaan::where('status', 3)->get();

        foreach ($permintaan as $key => $value) {
            if (Carbon::parse($permintaan[$key]->pengambilan->tanggal_batas) < Carbon::today()) {
                $bibit = Bibit::find($permintaan[$key]->bibit_id);
                $permintaan[$key]->update([
                    'status' => 2
                ]);

                $bibit->update([
                    'kuota' => $bibit->kuota + $permintaan[$key]->jumlah_bibit
                ]);
            }
        }

        $sekarang = Permintaan::whereDay('created_at', Carbon::now()->day)->count();
        $bulan = Permintaan::whereMonth('created_at', Carbon::now()->month)->count();
        $pending = Permintaan::where('status', 1)->count();
        $bibit_diterima = Permintaan::where('status', 4)->sum('jumlah_bibit');
        $data = [];
        for ($i = 0; $i < 12; $i++) {
            $data[$i] = Permintaan::whereMonth('created_at', $i + 1)->count();
        }

        if (Auth::check()) {
            if (Auth::user()->role_id == 3) {
                return view('index');
            } elseif (Auth::user()->role_id == 2) {
                return view('persemaian.index', compact('data', 'sekarang', 'bulan', 'pending', 'bibit_diterima'));
            } elseif (Auth::user()->role_id == 1) {
                return view('admin.index',  compact('data', 'sekarang', 'bulan', 'pending', 'bibit_diterima'));
            }
        } else {
            return view('index');
        }
    }

    public function about(){
        return view('about');
    }
}
