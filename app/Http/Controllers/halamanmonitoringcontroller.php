<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class halamanmonitoringcontroller extends Controller
{
    public function index()
    {
        return view('HalamanMonitoring.index');
    }
}
