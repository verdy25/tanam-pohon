<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\Bibit;
use App\Bukti;
use App\Masyarakat;
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
            'nik' => 'required|digits:16',
            'telp' => 'required|regex:/^[0-9]+$/|between:10,12',
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

        $bibit = Bibit::find($request->bibit_id);
        if ($bibit->kuota > $request->jumlah_bibit) {
            $kuota = $bibit->kuota - $request->jumlah_bibit;
            $bibit->update([
                'kuota' => $kuota
            ]);

            Permintaan::create([
                'penanggungjawab' => $request->nama,
                'user_id' => $request->user()->id,
                'alamat' => $request->alamat,
                'nik' => $request->nik,
                'telp' => '+62' . $request->telp,
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
            return redirect('/minta')->with('success', 'Permintaan anda telah dibuat, silahkan menunggu untuk dikonfirmasi');
        } else {
            return back()->withInput()->with('warning', 'Jumlah bibit anda lebih besar dari kuota');
        }
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

    public function hapus_bukti($id)
    {
        $bukti = Bukti::where('id', $id)->first();
        File::delete('bukti/' . $bukti->file);

        // hapus data
        Bukti::where('id', $id)->delete();
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

        $permintaan = Permintaan::findOrFail($id);
        $bukti = Bukti::where('permintaan_id', $id)->get();

        $user_id = $permintaan->user_id;
        $masyarakat = Masyarakat::where('user_id', $user_id)->get();
        $profile = $masyarakat[0];

        if (auth()->user()->role_id == 1) {
            $status = StatusPengajuan::find([1, 2, 3]);
            return view('admin.permintaan.status', compact('permintaan', 'status', 'bukti', 'profile'));
        } elseif (auth()->user()->role_id == 2) {
            $status = StatusPengajuan::find([3, 4]);
            return view('persemaian.permintaan.status', compact('permintaan', 'status', 'bukti', 'profile'));
        }
    }

    public function update_status(Request $request, $id)
    {

        if (auth()->user()->role_id == 1) {

            $request->validate([
                'status' => 'required'
            ]);

            $permintaan = Permintaan::find($id);
            $bibit = $permintaan->bibit()->find($permintaan->bibit_id);

            Permintaan::where('id', $id)->update([
                'status' => $request->status
            ]);

            if ($request->status == 2) {
                Bibit::where('id', $permintaan->bibit_id)->update([
                    'kuota' => $bibit->kuota + $permintaan->jumlah_bibit
                ]);
            };

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
        $bukti = Bukti::where('permintaan_id', $id)->get();

        $user_id = $permintaan->user_id;
        $masyarakat = Masyarakat::where('user_id', $user_id)->get();
        $profile = $masyarakat[0];

        if (auth()->user()->role_id == 1) {
            $status = StatusPengajuan::find([5, 6]);
        } elseif (auth()->user()->role_id == 2) {
            $status = StatusPengajuan::find([4]);
            if ($permintaan->status == 5 || $permintaan->status == 6) {
                $status = StatusPengajuan::find([$permintaan->status]);
            } else { }
        }
        return view('admin.permintaan.status', compact('permintaan', 'status', 'bukti', 'profile'));
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

    public function permintaan($id)
    {
        $permintaan = Permintaan::find($id);
        $user_id = $permintaan->user_id;
        $masyarakat = Masyarakat::where('user_id', $user_id)->get();
        $profile = $masyarakat[0];
        $bukti = Bukti::where('permintaan_id', $id)->get();

        return view('admin.permintaan.detail', compact('permintaan', 'profile', 'bukti'));
    }
}
