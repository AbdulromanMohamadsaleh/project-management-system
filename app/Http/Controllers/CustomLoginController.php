<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CustomLoginController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

}
