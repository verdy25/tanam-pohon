<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LahanKondisi;
use App\LahanCiri;

class LahanKondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kondisi = LahanKondisi::all();
        return view('admin.lahan.kondisi.index', compact('kondisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciri = LahanCiri::orderBy('ciri', 'asc')->get();
        return view('admin.lahan.kondisi.create', compact('ciri'));
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
            'kondisi' => 'required',
            'penanganan' => 'required'
        ]);

        $kondisi = new LahanKondisi;
        $kondisi->kondisi = $request->kondisi;
        $kondisi->penanganan = $request->penanganan;
        $kondisi->save();

        $ciriciri =  $request->ciri;
        $kondisi->ciri()->attach($ciriciri);

        return redirect('/lahan/kondisi')->with('status', 'Kondisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kondisi = LahanKondisi::findOrFail($id);
        return view('admin.lahan.kondisi.detail', compact('kondisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kondisi = LahanKondisi::findOrFail($id);
        $ciri = LahanCiri::orderBy('ciri', 'asc')->get();
        return view('admin.lahan.kondisi.edit', compact('kondisi', 'ciri'));
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
        $request->validate([
            'kondisi' => 'required',
            'penanganan' => 'requireds'
        ]);

        LahanKondisi::where('id', $id)->update([
            'kondisi' => $request->kondisi,
            'penanganan' => $request->penanganan
        ]);

        $kondisi = LahanKondisi::find($id);
        $ciriciri = $request->ciri;
        $kondisi->ciri()->sync($ciriciri);

        return redirect('/lahan/kondisi')->with('status', 'berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kondisi = LahanKondisi::find($id);
        $kondisi->ciri()->sync([]);
        LahanKondisi::destroy($id);
        return redirect('/lahan/kondisi')->with('status', 'ciri-ciri berhasil dihapus');
    }
}
