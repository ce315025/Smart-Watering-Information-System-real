<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jadwalcontroller extends Controller
{
    public function index()
    {
        return view('HalamanJadwal.jadwal');
    }
}
