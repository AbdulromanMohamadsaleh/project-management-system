<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;


class LoginController extends Controller
{
    public function Index()
    {
        $login = Login::all();
        return view('Admin.createuser', ['login' => $login]);
    }
}
