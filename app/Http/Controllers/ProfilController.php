<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use App\Permintaan;
use App\Masyarakat;
use App\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $data = Masyarakat::where('user_id', Auth::user()->id)->first();
        $id = $data->id;
        $profile = Masyarakat::find($id);
        $profile->hp = substr($profile->hp, 3);
        $provinces = DB::table("indonesia_provinces")->pluck("name", "id");
        return view('user.profil', compact('provinces', 'data', 'profile'));
    }

    public function getCity(Request $request)
    {
        $cities = DB::table("indonesia_cities")
            ->where("province_id", $request->province_id)
            ->pluck("name", "id");
        return response()->json($cities);
    }

    public function getDistrict(Request $request)
    {
        $districts = DB::table("indonesia_districts")
            ->where("city_id", $request->city_id)
            ->pluck("name", "id");
        return response()->json($districts);
    }

    public function searchCity(Request $request)
    {
        $data = Kabupaten::select("name")
            ->where("name", "LIKE", "%{$request->input('query')}%")
            ->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z ]+$/u',
            'tempat_lahir' => 'required|regex:/^[a-zA-Z ]+$/u|nullable|string',
            'tanggal_lahir' => 'required|before:today',
            'hp' => 'required|regex:/^[0-9]+$/|between:10,12',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required'
        ]);

        $data = Masyarakat::where('user_id', Auth::user()->id)->get();
        Masyarakat::where('id', $data[0]->id)->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hp' => '+62' . $request->hp,
            'provinsi_id' => $request->provinsi,
            'kabupaten_id' => $request->kota,
            'kecamatan_id' => $request->kecamatan,
            'alamat' => $request->alamat
        ]);

        
        User::where('id',  $data[0]->id)->update([
            'name' => $request->nama
        ]);

        return back()->with('success', 'Berhasil memperbarui profil');
    }

    public function admin()
    {
        $masyarakats = Masyarakat::all();
        return view('admin.masyarakat.index', compact('masyarakats'));
    }

    public function detail($id)
    {
        $masyarakat = Masyarakat::find($id);
        $permintaan = Permintaan::where('user_id', $masyarakat->user_id)->get();
        return view('admin.masyarakat.detail', compact('masyarakat', 'permintaan'));
    }

    public function profiladmin()
    {
        $data = Masyarakat::where('user_id', Auth::user()->id)->first();
        $id = $data->id;
        $profile = Masyarakat::find($id);
        $profile->hp = substr($profile->hp, 3);
        $provinces = DB::table("indonesia_provinces")->pluck("name", "id");
        return view('admin.profil', compact('provinces', 'data', 'profile'));
    }

    public function updateprofiladmin(Request $request)
    {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z ]+$/u',
            'tempat_lahir' => 'required|regex:/^[a-zA-Z ]+$/u|nullable|string',
            'tanggal_lahir' => 'required|before:today',
            'hp' => 'required|regex:/^[0-9]+$/|between:10,12',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required'
        ]);

        $data = Masyarakat::where('user_id', Auth::user()->id)->get();

        Masyarakat::where('id', $data[0]->id)->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hp' => '+62' . $request->hp,
            'provinsi_id' => $request->provinsi,
            'kabupaten_id' => $request->kota,
            'kecamatan_id' => $request->kecamatan,
            'alamat' => $request->alamat
        ]);

        User::where('id',  Auth::user()->id)->update([
            'name' => $request->nama
        ]);

        return redirect('/profil')->with('success', 'berhasil di update');
    }
}
