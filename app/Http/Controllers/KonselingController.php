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

        $atas = array();
        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                $atas[$k->id] = collect($nilai[$k->id])->sum();
            }
        }

        $bawah = array();
        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                $findDetail = LahanKondisiDetail::find($value->id);
                $bawah[$k->id][$value->id] = $findDetail->cirilahan->bobot;
            }
        }

        $hasil = array();
        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                $hasil[$k->id] =  $atas[$k->id] / collect($bawah[$k->id])->sum();
            }
        }
        // return $hasil;
        $sort = collect($hasil)->sort()->last();

        foreach ($kondisi as $k) {
            $id = LahanKondisiDetail::where('lahan_kondisi_id', $k->id)->get('id');
            foreach ($id as $value) {
                if ($hasil[$k->id] == $sort) {
                    $idResult = $k->id;
                }
            }
        }

        Konsultasi::create([
            'user_id' => Auth::id(),
            'kondisi_id' => $idResult
        ]);

        return redirect('/konseling/riwayat');
    }

}
