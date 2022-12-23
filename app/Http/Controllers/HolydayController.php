<?php

namespace App\Http\Controllers;

use App\Models\Holyday;
use Illuminate\Http\Request;

class HolydayController extends Controller
{
    public function Index()
    {
        $Holydays = Holyday::all();
        return view('Admin.dateholyday' , ['holydays' => $Holydays]);
    }
}
