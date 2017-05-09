<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\jagung;

class JagungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index()
    {
        //show data
        $jagungs =  jagung::all();
        return view('HalamanJagung.index',['jagungs' => $jagungs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        //create new data
        return view('HalamanJagung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        // we will create validation function here
        $this->validate($request,[
            'nama'=> 'required',
            'family' => 'required',
        ]);

        $jagungs = new jagung;
        $jagungs->nama = $request->nama;
        $jagungs->family = $request->family;
        $jagungs->family = $request->family;
        $jagungs->tanggal_tanam = $request->tanggal_tanam;
        $jagungs->usia = $request->usia;
        $jagungs->hama = $request->hama;
        $jagungs->syarat_tumbuh = $request->syarat_tumbuh;
        $jagungs->pemeliharaan = $request->pemeliharaan;

        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $request->file('images')->move("image/",$fileName);
        $jagungs->images = $fileName;
        // save all data
        $jagungs->save();
        //redirect page after save data
        return redirect('jagung')->with('message','data hasbeen updated!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function show($id)
    {
        $jagungs = jagung::findOrFail($id);
        return view('HalamanJagung.lihat', compact('jagungs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {
        $jagungs = jagung::findOrFail($id);
        // return to the edit views
        return view('HalamanJagung.edit',compact('jagungs'));
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

        $jagungs = jagung::findOrFail($id);
        $jagungs->nama = $request->nama;
        $jagungs->family = $request->family;
        $jagungs->tanggal_tanam = $request->tanggal_tanam;
        $jagungs->usia = $request->usia;
        $jagungs->hama = $request->hama;
        $jagungs->syarat_tumbuh = $request->syarat_tumbuh;
        $jagungs->pemeliharaan = $request->pemeliharaan;

        $jagungs->save();

        return redirect()->route('jagung.index')->with('alert-success','Data Hasbeen Saved!');
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
        $jagungs = jagung::findOrFail($id);
        $jagungs->delete();
        return redirect()->route('jagung.index')->with('alert-success','Data Hasbeen Saved!');
    }
}