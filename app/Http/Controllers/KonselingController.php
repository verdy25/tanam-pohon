<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use App\LahanCiri;
use App\LahanKondisi;
use App\LahanKondisiDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    public function riwayat()
    {
        $konsultasi = Konsultasi::where('user_id', Auth::id())->get();
        return view('user.konsultasi.riwayat', compact('konsultasi'));
    }

    public function index()
    {
        $ciri = LahanCiri::orderBy('ciri', 'asc')->get();
        $kondisi = LahanKondisi::all();
        $konsultasi = Konsultasi::where('user_id', Auth::id())->get();
        return view('user.konsultasi.index', compact('kondisi', 'ciri', 'konsultasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ciri' => 'required'
        ]);

        $kondisi = LahanKondisi::all();
        $detail = LahanKondisiDetail::all();
        $ciri = $request->ciri;

        $nilai = array();
        foreach ($kondisi as $k) {
            foreach ($ciri as $key => $value) {
                $lahandetail = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->where('lahan_ciri_id', $value)->first();
                if (!empty($lahandetail)) {
                    $cirii = LahanCiri::find($value);
                    $nilai[$k->id][$key] = $cirii->bobot;
                } else {
                    $nilai[$k->id][$key] = 0;
                }
            }
        }

        // dd($nilai);

        $atas = array();
        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                $atas[$k->id] = collect($nilai[$k->id])->sum();
            }
        }

        // dd($atas);

        $bawah = array();
        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                $findDetail = LahanKondisiDetail::find($value->id);
                $bawah[$k->id][$value->id] = $findDetail->cirilahan->bobot;
            }
        }

        // dd($bawah);

        $hasil = array();
        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                $hasil[$k->id] =  $atas[$k->id] / collect($bawah[$k->id])->sum();
            }
        }
        
        // dd($hasil);

        $sort = collect($hasil)->sort()->last();

        // dd($sort);

        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                if ($hasil[$k->id] == $sort) {
                    $idResult = $k->id;
                }
            }
        }

        // dd($idResult);

        Konsultasi::create([
            'user_id' => Auth::id(),
            'kondisi_id' => $idResult
        ]);

        return redirect('/konseling/riwayat');
    }

}
