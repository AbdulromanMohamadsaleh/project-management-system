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

    public function Save(Request $request)
    {

        $request->validate([
            'create_holyday_name' => 'required|min:2|max:50',
            'create_date_holyday' => 'required|date', // after:now
        ]);

        $Holydays = new Holyday();
        $HolydaysCounter = Holyday::count();

        $HolydaysID = "HDAY" . sprintf("%04d", ($HolydaysCounter == 0 || $HolydaysCounter == '' ? 1 : $HolydaysCounter + 1));

        $HolydaysCounterId = 1;
        while (Holyday::where('HOLYDAY_ID', $HolydaysID)->first()) {
            $HolydaysID = "HDAY" . sprintf("%04d", ($HolydaysCounter == 0 || $HolydaysCounter == '' ? 1 : $HolydaysCounter + ++$HolydaysCounterId));
        }

        $Holydays->HOLYDAY_ID = $HolydaysID;
        $Holydays->HOLYDAY_NAME = $request->create_holyday_name;
        $Holydays->HOLYDAY_DATE = $request->create_date_holyday;
        $Holydays->timestamps = false;
        $Holydays->save();


        $Holyday = Holyday::all();
        return response()->json([
            "success" => "Holyday Added Successfully", 'status' => 'success',
            'response_code' => 200,
            'data' => $Holyday->toJson()
        ]);
        // return redirect()->back()->with("success", "Add Holyday Successfully");
    }

    public function Delete($id)
    {
        $Holydays = Holyday::where('HOLYDAY_ID', $id)->delete();


        return redirect()->back()->with("success", "Delete Holyday Successfully");
    }

    public function Update(Request $request, $id)
    {
        $Holyday = Holyday::where('HOLYDAY_ID', $id)->first();

        $request->validate([
            'edit_holyday_name' => 'required|min:2|max:50',
            'edit_create_date_holyday' => 'required|date', // after:now
        ]);


        // Getting values from the blade template form
        $Holyday->HOLYDAY_NAME = $request->edit_holyday_name;
        $Holyday->HOLYDAY_DATE = $request->edit_create_date_holyday;
        // $Holyday->CATEGORY_ID = $id;
        $Holyday->timestamps = false;
        $Holyday->update();

        // return response()->json([
        //     "success" => "Holyday Edited Successfully", 'status' => 'success',
        //     'response_code' => 200,
        // ]);


        return redirect()->back()->with("success", "Edit Holyday Successfully");
    }
}
