<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController2 extends Controller
{
    public function index($value)
    {
        return view('main',['value' => $value]);

    }




}
