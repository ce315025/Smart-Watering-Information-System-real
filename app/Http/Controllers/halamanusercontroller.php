<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class halamanusercontroller extends Controller
{
    public function index()
    {
        return view('HalamanUser.index');
    }
}

