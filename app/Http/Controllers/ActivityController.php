<?php

namespace App\Http\Controllers;

use App\Models\ProjectActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function EditActivity(Request $request, $id)
    {
        $ProjectActivity = ProjectActivity::where('ACTIVITY_ID', $id)->first();

        $request->validate([
            'activity' => 'required', // after:now
        ]);


        // Getting values from the blade template form
        $ProjectActivity->ACTIVITY_NAME = $request->activity;
        // $Holyday->CATEGORY_ID = $id;
        $ProjectActivity->timestamps = false;
        $ProjectActivity->update();

        // return response()->json([
        //     "success" => "Holyday Edited Successfully", 'status' => 'success',
        //     'response_code' => 200,
        // ]);


        return redirect()->back()->with("success", "Edit Activity Successfully");
    }
}
