<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;


class LoginController extends Controller
{
    function Index()
    {
        return view('login');
    }
    function validate_login( Request $request)
    {
        $request->validate([
        'email' => 'required',
        'pasword' => 'required'
        ]);
        $credentials = $request->only('emial','password');
        if(Auth::attempt($credentials))
        {
            return redirect('index');
        }
        return redirect('login')->witg('success','login details are not valid');
    }
    function Home()
    {
        if(Auth::check())
        {
            return view('Admin.index');
        }
    }
}
