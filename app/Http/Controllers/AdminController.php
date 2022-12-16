<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDetial;

class AdminController extends Controller
{

    public function Index(){
        return view('Admin.index');
    }
    public function Table(){

        $project_details = ProjectDetial::all();



        return view('Admin.table',['project_details' => $project_details]);
    }
    public function Create(){
        return view('Admin.create');
    }
}
