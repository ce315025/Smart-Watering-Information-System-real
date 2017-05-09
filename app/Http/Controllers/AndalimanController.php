<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\andaliman;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\andaliman\StoreRequest;
use App\Http\Requests\andaliman\UpdateRequest;
use Image;

class AndalimanController extends Controller
{
    public function index()
    {
        $andalimans = andaliman::all();
        return view('MonitoringAndaliman.index', compact('andalimans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MonitoringAndaliman.create');
    }

    public function siram()
    {
        return view('MonitoringAndaliman.siram');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $andalimans = new andaliman();

        $andalimans->nama = $request->nama;
        $andalimans->family = $request->family;
        $andalimans->tanggal_tanam = $request->tanggal_tanam;
        $andalimans->usia = $request->usia;
        $andalimans->hama = $request->hama;
        $andalimans->syarat_tumbuh = $request->syarat_tumbuh;
        $andalimans->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $request->file('foto')->move("image/",$fileName);
        $andalimans->foto = $fileName;

//        $image = Input::file('image');
//        var_dump($image);
//        Input::file('image')->getClientOriginalExtension();
//        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
//        Image::make($image->getRealPath())->resize(468, 249)->save('public/image/'. $filename);
//        $andalimans->foto = 'image/ '. $filename;
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
//            $andalimans->foto = $destination_path.$filename;
//        }






        $andalimans->save();
        return redirect()->route('andaliman.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $andalimans = andaliman::findOrFail($id);
        return view('MonitoringAndaliman.lihat', compact('andalimans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $andalimans = andaliman::findOrFail($id);
        return view('andaliman.edit', compact('andalimans'));
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
        $andalimans = andaliman::findOrFail($id);
        $andalimans->foto = $request->foto;
        $andalimans->nama = $request->nama;
        $andalimans->family = $request->family;
        $andalimans->tanggal_tanam = $request->tanggal_tanam;
        $andalimans->usia = $request->usia;
        $andalimans->hama = $request->hama;
        $andalimans->syarat_tumbuh = $request->syarat_tumbuh;
        $andalimans->pemeliharaan = $request->pemeliharaan;
        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $andalimans->images = $fileName;
        $andalimans->save();
        return redirect()->route('andaliman.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $andalimans = andaliman::findOrFail($id);
        $andalimans->delete();
        return redirect()->route('andaliman.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
