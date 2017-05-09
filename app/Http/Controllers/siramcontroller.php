<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sayur;
use App\Http\Requests;
use App\Http\Requests\sayur\StoreRequest;
use App\Http\Requests\sayur\UpdateRequest;
class siramcontroller extends Controller
{
    public function index()
    {
        return view('HalamanMonitoring.siram');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('HalamanMonitoring.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $sayurs = new sayur();
        $sayurs->foto = $request->foto;
        $sayurs->nama = $request->nama;
        $sayurs->family = $request->family;
        $sayurs->tanggal_tanam = $request->tanggal_tanam;
        $sayurs->usia = $request->usia;
        $sayurs->hama = $request->hama;
        $sayurs->syarat_tumbuh = $request->syarat_tumbuh;
        $sayurs->pemeliharaan = $request->pemeliharaan;
        $sayurs->save();
        return redirect()->route('HalamanMonitoring.siram')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sayurs = sayur::findOrFail($id);
        return view('HalamanMonitoring.lihat', compact('sayurs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sayurs = sayur::findOrFail($id);
        return view('HalamanMonitoring.edit', compact('sayurs'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $sayurs = sayur::findOrFail($id);
        $sayurs->foto = $request->foto;
        $sayurs->nama = $request->nama;
        $sayurs->family = $request->family;
        $sayurs->tanggal_tanam = $request->tanggal_tanam;
        $sayurs->usia = $request->usia;
        $sayurs->hama = $request->hama;
        $sayurs->syarat_tumbuh = $request->syarat_tumbuh;
        $sayurs->pemeliharaan = $request->pemeliharaan;
        $sayurs->save();
        return redirect()->route('HalamanMonitoring.siram')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sayurs = sayur::findOrFail($id);
        $sayurs->delete();
        return redirect()->route('HalamanMonitoring.siram')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
