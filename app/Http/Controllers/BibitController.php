<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bibit;

class BibitController extends Controller
{
    public function index()
    {
        $bibit = Bibit::all();
        return view('persemaian.bibit.index', compact('bibit'));
    }

    public function create(){
        return view('persemaian.bibit.create');
    }

    public function store(Request $request){
        $request->validate([
            'bibit' => 'required',
            'kuota' => 'required|numeric',
            'panen' => 'required',
            'deskripsi' => 'required'
        ]);

        Bibit::create($request->all());
        return redirect('/bibit')->with('status', 'berhasil ditambahkan');
    }
    
    public function show($id){
        $bibit = Bibit::findOrFail($id);
        return view('persemaian.bibit.detail', compact('bibit'));
    }

    public function edit($id){
        $bibit = Bibit::findOrFail($id);
        return view('persemaian.bibit.edit', compact('bibit'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'bibit' => 'required',
            'kuota' => 'required|numeric',
            'panen' => 'required',
            'deskripsi' => 'required'
        ]);

        Bibit::where('id', $id)
            ->update([
                'bibit' => $request->bibit,
                'kuota' => $request->kuota,
                'panen' => $request->panen,
                'deskripsi' => $request->deskripsi
            ]);

        return redirect('/bibit')->with('status', 'Data berhasil diperbarui');
    }

    public function destroy($id){
        Bibit::destroy($id);
        return redirect('/bibit')->with('status', 'Data telah dihapus');
    }

    public function informasi(){
        $bibit = Bibit::all();
        return view('user.bibit.index', compact('bibit'));
    }
}
