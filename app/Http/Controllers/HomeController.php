<?php

namespace App\Http\Controllers;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::check()) {
            if (Auth::user()->role_id == 3) {
                return view('index');
            } elseif (Auth::user()->role_id == 2) {
                $sekarang = Permintaan::whereDay('created_at', Carbon::now()->day)->count();
                $bulan = Permintaan::whereMonth('created_at', Carbon::now()->month)->count();
                $data = [];
                for ($i=0; $i < 12; $i++) { 
                    $data[$i] = Permintaan::whereMonth('created_at', $i+1)->count();
                }
                // return $data;
                return view('persemaian.index', compact('data', 'sekarang', 'bulan'));
            } elseif (Auth::user()->role_id == 1) {
                $sekarang = Permintaan::whereDay('created_at', Carbon::now()->day)->count();
                $bulan = Permintaan::whereMonth('created_at', Carbon::now()->month)->count();
                $data = [];
                for ($i=0; $i < 12; $i++) { 
                    $data[$i] = Permintaan::whereMonth('created_at', $i+1)->count();
                }
                return view('admin.index',  compact('data', 'sekarang', 'bulan'));
            }
        } else {
            return view('index');
        }
    }
}
