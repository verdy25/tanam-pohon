<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\Bibit;
use App\Bukti;
use App\StatusPengajuan;
use Illuminate\Support\Facades\Auth;
use File;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaan = Permintaan::where('user_id', Auth::user()->id)->get();
        return view('user.minta.index', compact('permintaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function individu()
    {
        $bibits = Bibit::all();
        return view('user.minta.individu', compact('bibits'));
    }

    public function kelompok()
    {
        $bibits = Bibit::all();
        return view('user.minta.kelompok', compact('bibits'));
    }

    public function instansi()
    {
        $bibits = Bibit::all();
        return view('user.minta.instansi', compact('bibits'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'telp' => 'required',
            'tujuan' => 'required',
            'bibit_id' => 'required',
            'jumlah_bibit' => 'required|numeric|max:1500',
            'luas_lahan' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
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
        $ktp_file = time() .  $ktp->getClientOriginalName();
        $spptpbb_file = time() .  $spptpbb->getClientOriginalName();
        $permohonan_file = time() .  $permohonan->getClientOriginalName();

        $ktp->move($tujuan_ktp, $ktp_file);
        $spptpbb->move($tujuan_spptpbb, $spptpbb_file);
        $permohonan->move($tujuann_permohonan, $permohonan_file);

        Permintaan::create([
            'penanggungjawab' => $request->nama,
            'user_id' => $request->user()->id,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'telp' => $request->telp,
            'tujuan' => $request->tujuan,
            'bibit_id' => $request->bibit_id,
            'jumlah_bibit' => $request->jumlah_bibit,
            'luas_lahan' => $request->luas_lahan,
            'latitude' =>  $request->latitude,
            'longitude' =>  $request->longitude,
            'ktp' => $ktp_file,
            'spptpbb' => $spptpbb_file,
            'permohonan' => $permohonan_file,
            'status' => 1
        ]);

        return redirect('/minta')->with('status', 'Permintaan anda telah dibuat, silahkan menunggu untuk dikonfirmasi');
    }


    public function upload_bukti(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required|mimes:jpeg,png,jpg|max:2048'
        ]);

        $bukti = $request->file('bukti');
        $folder = 'bukti';
        $filename = time() . $bukti->getClientOriginalName();
        $bukti->move($folder, $filename);

        $jumlah = Bukti::where('permintaan_id', $id)->count();

        if ($jumlah < 4) {
            Bukti::create([
                'bukti' => $filename,
                'permintaan_id' => $request->permintaan_id
            ]);
            return back()->with(['success' => 'Upload berhasil']);
        } else {
            return back()->with(['info' => 'maksimal upload 4 foto']);
        }
    }

    public function hapus_bukti($id){
        $bukti = Bukti::where('id',$id)->first();
        File::delete('bukti/'.$bukti->file);
     
        // hapus data
        Bukti::where('id',$id)->delete();
        return back()->with(['success' => 'Bukti berhasil dihapus']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $bukti = Bukti::where('permintaan_id', $id)->get();
        return view('user.minta.detail', compact('permintaan', 'bukti'));
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
        Permintaan::where('id', $id)->update([]);
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
    public function pengajuan()
    {
        if (auth()->user()->role_id == 1) {
            $permintaan = Permintaan::whereIn('status', [1, 2, 3])->get();
            return view('admin.permintaan.index', compact('permintaan'));
        } elseif (auth()->user()->role_id == 2) {
            $permintaan = Permintaan::whereIn('status', [3])->get();
            return view('persemaian.permintaan.index', compact('permintaan'));
        }
    }

    public function edit_status($id)
    {
        if (auth()->user()->role_id == 1) {
            $permintaan = Permintaan::findOrFail($id);
            $status = StatusPengajuan::find([1, 2, 3]);
            return view('admin.permintaan.status', compact('permintaan', 'status'));
        } elseif (auth()->user()->role_id == 2) {
            $permintaan = Permintaan::findOrFail($id);
            $status = StatusPengajuan::find([3, 4]);
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

            return redirect('/pengajuan');
        } elseif (auth()->user()->role_id == 2) {
            $request->validate([
                'status' => 'required'
            ]);

            Permintaan::where('id', $id)->update([
                'status' => $request->status
            ]);

            return redirect('/pengajuan');
        }
    }


    public function penerima()
    {
        $permintaan = Permintaan::whereIn('status', [4, 5, 6])->get();
        return view('admin.permintaan.penerima', compact('permintaan'));
    }

    public function edit_penerimaan($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $status = StatusPengajuan::find([4, 5, 6]);
        return view('admin.permintaan.status', compact('permintaan', 'status'));
    }

    public function update_penerimaan(Request $request, $id)
    {

        $request->validate([
            'status' => 'required'
        ]);

        Permintaan::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect('/pengajuan');
    }
}
