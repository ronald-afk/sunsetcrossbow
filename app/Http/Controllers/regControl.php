<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class regControl extends Controller
{
    public function index()
    {
        return view('register');
    }
}
