<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function Index(){
        return view('Admin.index');
    }
    public function CrateProject(){
        return view('');
    }
}
