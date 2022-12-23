<?php

namespace App\Http\Controllers;
use App\Models\Login;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function dashbord()
    {
        return view('user/dashbord');
    }
    public function Profile()
    {
        $profile = Login::first();
        return view('Admin.profile' ,['profile' => $profile]);
    }
    public function Login()
    {
        return view('user.login');
    }
    public function Register()
    {
        return view('user.register');
    }
}
