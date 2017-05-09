<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\tomat;

class TomatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index()
    {
        //show data
        $tomats =  tomat::all();
        return view('HalamanTomat.index',['tomats' => $tomats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        //create new data
        return view('HalamanTomat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request,[
            'nama'=> 'required',
            'family' => 'required',
        ]);
        // create new data
        $destinatonPath = '';
        $filename = '';



        $tomats = new tomat();

        $tomats->nama = $request->nama;
        $tomats->family = $request->family;
        $tomats->tanggal_tanam = $request->tanggal_tanam;
        $tomats->usia = $request->usia;
        $tomats->hama = $request->hama;
        $tomats->syarat_tumbuh = $request->syarat_tumbuh;
        $tomats->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $tomats->images = $fileName;
        // save all data
        $tomats->save();
        return redirect()->route('tomat.index')->with('alert-success', 'Data Berhasil Disimpan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function show($id)
    {
        $tomats = tomat::findOrFail($id);
        return view('HalamanTomat.lihat', compact('tomats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {
        $tomat = tomat::findOrFail($id);
        // return to the edit views
        return view('HalamanTomat.edit',compact('tomat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request,[
            'nama'=> 'required',
            'family' => 'required',
        ]);

        $tomats = tomat::findOrFail($id);
        $tomats->images = $request->images;
        $tomats->nama = $request->nama;
        $tomats->family = $request->family;
        $tomats->tanggal_tanam = $request->tanggal_tanam;
        $tomats->usia = $request->usia;
        $tomats->hama = $request->hama;
        $tomats->syarat_tumbuh = $request->syarat_tumbuh;
        $tomats->pemeliharaan = $request->pemeliharaan;
        $tomats->save();

        return redirect()->route('tomat.index')->with('alert-success','Data Hasbeen Saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {
        // delete data
        $tomat = tomat::findOrFail($id);
        $tomat->delete();
        return redirect()->route('tomat.index')->with('alert-success','Data Hasbeen Saved!');
    }
}