<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DateTime;

class CustomAuthController extends Controller
{
    public function Logout()
    {

        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
