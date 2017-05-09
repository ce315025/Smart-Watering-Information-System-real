<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cabe;
use App\Http\Requests;
use App\Http\Requests\cabe\StoreRequest;
use App\Http\Requests\cabe\UpdateRequest;
use Illuminate\Support\Facades\Input;
use Image;
class cabecontroller extends Controller
{
    public function index()
    {
        $cabes = cabe::all();
        return view('MonitoringCabe.monitoringcabe', compact('cabes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MonitoringCabe.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cabes = new cabe();

        $cabes->nama = $request->nama;
        $cabes->family = $request->family;
        $cabes->tanggal_tanam = $request->tanggal_tanam;
        $cabes->usia = $request->usia;
        $cabes->hama = $request->hama;
        $cabes->syarat_tumbuh = $request->syarat_tumbuh;
        $cabes->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $request->file('foto')->move("image/",$fileName);
        $cabes->foto = $fileName;
        $cabes->save();
        return redirect()->route('cabe.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabes = cabe::findOrFail($id);
        return view('MonitoringCabe.lihat', compact('cabes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabes = cabe::findOrFail($id);
        return view('MonitoringCabe.edit', compact('cabes'));
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
        $cabes = cabe::findOrFail($id);
        $cabes->foto = $request->foto;
        $cabes->nama = $request->nama;
        $cabes->family = $request->family;
        $cabes->tanggal_tanam = $request->tanggal_tanam;
        $cabes->usia = $request->usia;
        $cabes->hama = $request->hama;
        $cabes->syarat_tumbuh = $request->syarat_tumbuh;
        $cabes->pemeliharaan = $request->pemeliharaan;
        $cabes->save();
        return redirect()->route('cabe.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabes = cabe::findOrFail($id);
        $cabes->delete();
        return redirect()->route('cabe.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
