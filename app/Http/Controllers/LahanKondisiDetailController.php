<?php

namespace App\Http\Controllers;

use App\LahanCiri;
use App\LahanKondisi;
use App\LahanKondisiDetail;
use Illuminate\Http\Request;

class LahanKondisiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kondisidetail = LahanKondisiDetail::all();
        return view('admin.lahan.train.index', compact('kondisidetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kondisi = LahanKondisi::all();
        $ciri = LahanCiri::orderBy('ciri', 'asc')->get();
        return view('admin.lahan.train.create', compact('ciri', 'kondisi'));
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
            'ciri' => 'required'
        ]);

        $ciri = $request->ciri;
        foreach($ciri as $c){
            LahanKondisiDetail::create([
                'lahan_kondisi_id' => $request->kondisi,
                'lahan_ciri_id' => $c
            ]);
        };
        return redirect('/lahan')->with('sukses', 'data telah berhasil ditambahkan');
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
        LahanKondisiDetail::destroy($id);
        return redirect('/lahan');
    }
}
