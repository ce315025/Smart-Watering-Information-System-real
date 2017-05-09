<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kentang;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\kentang\StoreRequest;
use App\Http\Requests\kentang\UpdateRequest;
use Image;

class kentangcontroller extends Controller
{
    public function index()
    {
        $kentangs = kentang::all();
        return view('MonitoringKentang.monitoringkentang', compact('kentangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MonitoringKentang.create');
    }

    public function siram()
    {
        return view('MonitoringKentang.siram');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $kentangs = new kentang();

        $kentangs->nama = $request->nama;
        $kentangs->family = $request->family;
        $kentangs->tanggal_tanam = $request->tanggal_tanam;
        $kentangs->usia = $request->usia;
        $kentangs->hama = $request->hama;
        $kentangs->syarat_tumbuh = $request->syarat_tumbuh;
        $kentangs->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $request->file('foto')->move("image/",$fileName);
        $kentangs->foto = $fileName;

//        $image = Input::file('image');
//        var_dump($image);
//        Input::file('image')->getClientOriginalExtension();
//        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
//        Image::make($image->getRealPath())->resize(468, 249)->save('public/image/'. $filename);
//        $kentangs->foto = 'image/ '. $filename;
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
//            $kentangs->foto = $destination_path.$filename;
//        }






        $kentangs->save();
        return redirect()->route('kentang.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kentangs = kentang::findOrFail($id);
        return view('MonitoringKentang.lihat', compact('kentangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kentangs = kentang::findOrFail($id);
        return view('MonitoringKentang.edit', compact('kentangs'));
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
        $kentangs = kentang::findOrFail($id);
        $kentangs->foto = $request->foto;
        $kentangs->nama = $request->nama;
        $kentangs->family = $request->family;
        $kentangs->tanggal_tanam = $request->tanggal_tanam;
        $kentangs->usia = $request->usia;
        $kentangs->hama = $request->hama;
        $kentangs->syarat_tumbuh = $request->syarat_tumbuh;
        $kentangs->pemeliharaan = $request->pemeliharaan;
        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $kentangs->images = $fileName;
        $kentangs->save();
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
        $kentangs = kentang::findOrFail($id);
        $kentangs->delete();
        return redirect()->route('HalamanMonitoring.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
