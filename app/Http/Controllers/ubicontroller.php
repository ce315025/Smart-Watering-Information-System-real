<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ubi;
use App\Http\Requests;
use App\Http\Requests\ubi\StoreRequest;
use App\Http\Requests\ubi\UpdateRequest;
use Illuminate\Support\Facades\Input;
use Image;
class ubicontroller extends Controller
{
    public function index()
    {
        $ubis = ubi::all();
        return view('MonitoringUbi.monitoringubi', compact('ubis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MonitoringUbi.create');
    }

    public function siram()
    {
        return view('MonitoringUbi.siram');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $ubis = new ubi();

        $ubis->nama = $request->nama;
        $ubis->family = $request->family;
        $ubis->tanggal_tanam = $request->tanggal_tanam;
        $ubis->usia = $request->usia;
        $ubis->hama = $request->hama;
        $ubis->syarat_tumbuh = $request->syarat_tumbuh;
        $ubis->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $request->file('foto')->move("image/",$fileName);
        $ubis->foto = $fileName;

        $ubis->save();
        return redirect()->route('ubi.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubis = ubi::findOrFail($id);
        return view('MonitoringUbi.lihat', compact('ubis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubis = ubi::findOrFail($id);
        return view('MonitoringUbi.edit', compact('ubis'));
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
        $ubis = ubi::findOrFail($id);
        $ubis->foto = $request->foto;
        $ubis->nama = $request->nama;
        $ubis->family = $request->family;
        $ubis->tanggal_tanam = $request->tanggal_tanam;
        $ubis->usia = $request->usia;
        $ubis->hama = $request->hama;
        $ubis->syarat_tumbuh = $request->syarat_tumbuh;
        $ubis->pemeliharaan = $request->pemeliharaan;
        $ubis->save();
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
        $ubis = ubi::findOrFail($id);
        $ubis->delete();
        return redirect()->route('cabe.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
