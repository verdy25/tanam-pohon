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
            'kuota' => 'required|numeric'
        ]);

        Bibit::create($request->all());
        return redirect('/bibit')->with('status', 'berhasil ditambahkan');
    }

    public function edit($id){
        $bibit = Bibit::findOrFail($id);
        return view('persemaian.bibit.edit', compact('bibit'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'bibit' => 'required',
            'kuota' => 'required|numeric'
        ]);

        Bibit::where('id', $id)
            ->update([
                'bibit' => $request->bibit,
                'kuota' => $request->kuota
            ]);

        return redirect('/bibit')->with('status', 'Data berhasil diperbarui');
    }

    public function destroy($id){
        Bibit::destroy($id);
        return redirect('/bibit')->with('status', 'Data telah dihapus');
    }
}
