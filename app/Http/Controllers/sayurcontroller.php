<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sayur;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\sayur\StoreRequest;
use App\Http\Requests\sayur\UpdateRequest;
use Image;

class sayurcontroller extends Controller
{
    public function index()
{
    $sayurs = sayur::all();
    return view('HalamanMonitoring.monitoringsayur', compact('sayurs'));
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

    public function siram()
    {
        return view('HalamanMonitoring.siram');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $sayurs = new sayur();

        $sayurs->nama = $request->nama;
        $sayurs->family = $request->family;
        $sayurs->tanggal_tanam = $request->tanggal_tanam;
        $sayurs->usia = $request->usia;
        $sayurs->hama = $request->hama;
        $sayurs->syarat_tumbuh = $request->syarat_tumbuh;
        $sayurs->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $request->file('foto')->move("image/",$fileName);
        $sayurs->foto = $fileName;

//        $image = Input::file('image');
//        var_dump($image);
//        Input::file('image')->getClientOriginalExtension();
//        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
//        Image::make($image->getRealPath())->resize(468, 249)->save('public/image/'. $filename);
//        $sayurs->foto = 'image/ '. $filename;
//
//        $filename = $image[0]->getClientOriginalName();
//        print_($filename);


//        if ($request->hasFile('files_field')) {
//            $file= $request->Input('files_field');
//
//            $destination_path='image/';
//
//            $Orname = $file->getClientOriginalName();
//
//            $filename= str_random(6).'_'.$Orname;
//
//            $file->move($destination_path,$filename);
//
//            $sayurs->foto = $destination_path.$filename;
//        }






        $sayurs->save();
        return redirect()->route('HalamanMonitoring.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $sayurs->images = $fileName;
        $sayurs->save();
        return redirect()->route('HalamanMonitoring.index')->with('alert-success', 'Data Berhasil Diubah.');

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
        return redirect()->route('HalamanMonitoring.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
