<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kacang;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\kacang\StoreRequest;
use App\Http\Requests\kacang\UpdateRequest;
use Image;

class KacangController extends Controller
{
    public function index()
    {
        $kacangs = kacang::all();
        return view('MonitoringKacang.index', compact('kacangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MonitoringKacang.create');
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
        $kacangs = new kacang();

        $kacangs->nama = $request->nama;
        $kacangs->family = $request->family;
        $kacangs->tanggal_tanam = $request->tanggal_tanam;
        $kacangs->usia = $request->usia;
        $kacangs->hama = $request->hama;
        $kacangs->syarat_tumbuh = $request->syarat_tumbuh;
        $kacangs->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $request->file('foto')->move("image/",$fileName);
        $kacangs->foto = $fileName;

//        $image = Input::file('image');
//        var_dump($image);
//        Input::file('image')->getClientOriginalExtension();
//        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
//        Image::make($image->getRealPath())->resize(468, 249)->save('public/image/'. $filename);
//        $kacangs->foto = 'image/ '. $filename;
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
//            $kacangs->foto = $destination_path.$filename;
//        }






        $kacangs->save();
        return redirect()->route('kacang.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kacangs = kacang::findOrFail($id);
        return view('HalamanMonitoring.lihat', compact('kacangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kacangs = kacang::findOrFail($id);
        return view('HalamanMonitoring.edit', compact('kacangs'));
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
        $kacangs = kacang::findOrFail($id);
        $kacangs->foto = $request->foto;
        $kacangs->nama = $request->nama;
        $kacangs->family = $request->family;
        $kacangs->tanggal_tanam = $request->tanggal_tanam;
        $kacangs->usia = $request->usia;
        $kacangs->hama = $request->hama;
        $kacangs->syarat_tumbuh = $request->syarat_tumbuh;
        $kacangs->pemeliharaan = $request->pemeliharaan;
        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $kacangs->images = $fileName;
        $kacangs->save();
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
        $kacangs = kacang::findOrFail($id);
        $kacangs->delete();
        return redirect()->route('HalamanMonitoring.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
