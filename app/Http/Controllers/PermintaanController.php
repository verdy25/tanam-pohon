<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\Bibit;
use App\StatusPengajuan;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaan = Permintaan::all();
        return view('user.minta.index', compact('permintaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bibits = Bibit::all();
        return view('user.minta.buat', compact('bibits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'penanggungjawab' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'telp' => 'required',
            'tujuan' => 'required',
            'bibit_id' => 'required',
            'jumlah_bibit' => 'required|numeric',
            'luas_lahan' => 'required|numeric',
            'ktp' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            'spptpbb' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            'permohonan' => 'required|mimes:pdf,jpeg,png,jpg|max:2048'
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $ktp = $request->file('ktp');
        $spptpbb = $request->file('spptpbb');
        $permohonan = $request->file('permohonan');

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_ktp = 'ktp';
        $tujuan_spptpbb = 'spptpbb';
        $tujuann_permohonan = 'permohonan';

        // nama file
        $ktp_file = time() . "_" . $ktp->getClientOriginalName();
        $spptpbb_file = time() . "_" . $spptpbb->getClientOriginalName();
        $permohonan_file = time() . "_" . $permohonan->getClientOriginalName();

        $ktp->move($tujuan_ktp, $ktp_file);
        $spptpbb->move($tujuan_spptpbb, $spptpbb_file);
        $permohonan->move($tujuann_permohonan, $permohonan_file);

        Permintaan::create([
            'penanggungjawab' => $request->penanggungjawab,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'telp' => $request->telp,
            'tujuan' => $request->tujuan,
            'bibit_id' => $request->bibit_id,
            'jumlah_bibit' => $request->jumlah_bibit,
            'luas_lahan' => $request->luas_lahan,
            'ktp' => $ktp_file,
            'spptpbb' => $spptpbb_file,
            'permohonan' => $permohonan_file,
            'status' => 1
        ]);

        return redirect('/minta')->with('status', 'Permintaan anda telah dibuat, silahkan menunggu untuk dikonfirmasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //admin
    public function admin()
    {
        if (auth()->user()->role_id == 1) {
            $permintaan = Permintaan::all();
            $status = StatusPengajuan::all();
            return view('admin.permintaan.index', compact('permintaan', 'status'));
        } elseif (auth()->user()->role_id == 2) {
            $permintaan = Permintaan::whereIn('status', [3, 4])->get();
            $status = StatusPengajuan::all();
            return view('persemaian.permintaan.index', compact('permintaan', 'status'));
        }
    }

    public function edit_status($id)
    {
        if (auth()->user()->role_id == 1) {
            $permintaan = Permintaan::findOrFail($id);
            $status = StatusPengajuan::all();
            return view('admin.permintaan.status', compact('permintaan', 'status'));
        } elseif (auth()->user()->role_id == 2) {
            $permintaan = Permintaan::findOrFail($id);
            $status = StatusPengajuan::all();
            return view('persemaian.permintaan.status', compact('permintaan', 'status'));
        }
    }

    public function update_status(Request $request, $id)
    {

        if (auth()->user()->role_id == 1) {

            $request->validate([
                'status' => 'required'
            ]);

            Permintaan::where('id', $id)->update([
                'status' => $request->status
            ]);

            return redirect('/permintaan');
        } elseif (auth()->user()->role_id == 2) {
            $request->validate([
                'status' => 'required'
            ]);

            Permintaan::where('id', $id)->update([
                'status' => $request->status
            ]);

            return redirect('/permintaan');
        }
    }
}
