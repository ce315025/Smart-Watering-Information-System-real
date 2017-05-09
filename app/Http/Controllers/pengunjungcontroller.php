<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengunjung;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\pengunjung\StoreRequest;
use App\Http\Requests\pengunjung\UpdateRequest;
use Image;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjungs = pengunjung::all();
        return view('Pengunjung.index', compact('pengunjungs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pengunjung.create');
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
        $pengunjungs = new pengunjung();

        $pengunjungs->nama = $request->nama;
        $pengunjungs->tanggal_lahir = $request->tanggal_lahir;
        $pengunjungs->jenis_kelamin = $request->jenis_kelamin;
        $pengunjungs->alamat= $request->alamat;
        $pengunjungs->asal = $request->asal;
        $pengunjungs->no_hp = $request->no_hp;




//        $image = Input::file('image');
//        var_dump($image);
//        Input::file('image')->getClientOriginalExtension();
//        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
//        Image::make($image->getRealPath())->resize(468, 249)->save('public/image/'. $filename);
//        $pengunjungs->foto = 'image/ '. $filename;
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
//            $pengunjungs->foto = $destination_path.$filename;
//        }






        $pengunjungs->save();
        return redirect()->route('pengunjung.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengunjungs = pengunjung::findOrFail($id);
        return view('HalamanMonitoring.lihat', compact('pengunjungs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengunjungs = pengunjung::findOrFail($id);
        return view('HalamanMonitoring.edit', compact('pengunjungs'));
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
        $pengunjungs = pengunjung::findOrFail($id);
        $pengunjungs->foto = $request->foto;
        $pengunjungs->nama = $request->nama;
        $pengunjungs->family = $request->family;
        $pengunjungs->tanggal_tanam = $request->tanggal_tanam;
        $pengunjungs->usia = $request->usia;
        $pengunjungs->hama = $request->hama;
        $pengunjungs->syarat_tumbuh = $request->syarat_tumbuh;
        $pengunjungs->pemeliharaan = $request->pemeliharaan;
        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $pengunjungs->images = $fileName;
        $pengunjungs->save();
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
        $pengunjungs = pengunjung::findOrFail($id);
        $pengunjungs->delete();
        return redirect()->route('HalamanMonitoring.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
