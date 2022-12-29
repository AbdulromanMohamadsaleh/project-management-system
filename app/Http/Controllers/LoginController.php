<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function Index()
    {
        $login = User::all();
        return view('Admin.createuser', ['login' => $login]);
    }
    public function Login()
    {
        return view('auth.login');
    }

    public function CustomLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

       $credentials = [
        'EMAIL' => $request['email'],
        'PASSWORD' => $request['password'],

       ];
        if (Auth::attempt([
            'EMAIL' => $request['email'],
            'PASSWORD' => $request['password'],

           ])) {
            return redirect()->intended('dashboard')
            ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
}
