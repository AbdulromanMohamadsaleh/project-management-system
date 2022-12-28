<?php

namespace App\Http\Controllers;

use App\Models\Holyday;
use Illuminate\Http\Request;

class HolydayController extends Controller
{
    public function Index()
    {
        $Holydays = Holyday::all();



        return view('Admin.dateholyday', ['holydays' => $Holydays]);
    }
    public function Create()
    {
        return view('Admin.addholyday');
    }
    public function Save(request $request)
    {
        $Holydays = Holyday::count();

        $Holydays = "HDAY" . sprintf("%04d", ($Holydays == 0 || $Holydays == '' ? 1 : $Holydays + 1));
        $Holydays = new Holyday(['HOLYDAY_ID' => $Holydays]);
        $Holydays->HOLYDAY_NAME = $request->holyday_name;
        $Holydays->HOLYDAY_DATE = $request->date_holyday;
        $Holydays->timestamps = false;
        $Holydays->save();
        return redirect()->back();
    }
    public function Delete($id)
    {
        $Holydays = Holyday::where('HOLYDAY_ID', $id)->delete();
        return redirect()->back();
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'holyday_name' => 'required',
            'date_holyday' => 'required',
        ]);

        $Holyday = Holyday::where('HOLYDAY_ID', $id)->first();
        // Getting values from the blade template form
        $Holyday->HOLYDAY_NAME = $request->holyday_name;
        $Holyday->HOLYDAY_DATE = $request->date_holyday;
        // $Holyday->CATEGORY_ID = $id;
        $Holyday->timestamps = false;
        $Holyday->update();
        return redirect()->back();
    }
}
