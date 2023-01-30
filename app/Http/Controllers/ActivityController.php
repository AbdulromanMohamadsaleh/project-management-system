<?php

namespace App\Http\Controllers;

use App\Models\Holyday;
use App\Models\ProjectActivity;
use App\Models\ProjectTask;
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
    public function DelateActivity($id)
    {
        $ProjectActivity = ProjectActivity::where('ACTIVITY_ID', $id)->delete();


        return redirect()->back()->with("success", "Delete activity Successfully");
    }
    public function Create()
    {
        $Holydays = Holyday::all()->toJson();
        return view('edit_activity_task.add_activity_task', [
            'Holydays' => $Holydays,
        ]);
    }
    public function Save(Request $request)
    {

        // $validated = $request->validated();


        // Create Project Tracker Table
        // Save Activity & Tasks
        $activityName = $request->activityName;
        $taskName = $request->taskName;
        $taskCounter = $request->taskCounter;
        $taskDuration = $request->taskDuration;

        $counterForTask = 0;

        for ($i = 0; $i < count($activityName); $i++) {

            $ActivityCounter = ProjectActivity::count();

            $ActivityId = "ACT" . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $ActivityCounter + 1));

            $counterId2 = 1;
            while (ProjectActivity::where('ACTIVITY_ID', $ActivityId)->first()) {
                $ActivityId = "ACT"  . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $ActivityCounter + ++$counterId2));
            }

            $ProjectActivity = new ProjectActivity(['ACTIVITY_ID' => $ActivityId]);
            $ProjectActivity->ACTIVITY_NAME = $activityName[$i];
            $ProjectActivity->DETAIL_ID = $request->Project_ID;
            $ProjectActivity->DAY_WEEK = $request->projectDurationFormat;
            $ProjectActivity->ACTIVITY_ORDER = $i + 1;
            $ProjectActivity->save();

            for ($j = 0; $j < $taskCounter[$i]; $j++) {

                $TaskCounter = ProjectTask::count();
                $tskId = "TASK" . sprintf("%04d", ($TaskCounter == 0 || $TaskCounter == '' ? 1 : $TaskCounter + 1));

                $counterId3 = 1;
                while (ProjectTask::where('TASK_ID', $tskId)->first()) {
                    $tskId = "TASK"  . sprintf("%04d", ($TaskCounter == 0 || $TaskCounter == '' ? 1 : $TaskCounter + ++$counterId3));
                }

                $ProjectTask = new ProjectTask(['TASK_ID' => $tskId]);

                $ProjectTask->TASK_NAME = $taskName[$counterForTask];
                $ProjectTask->DAY = $taskDuration[$counterForTask];
                $ProjectTask->ACTIVITY_ID = $ActivityId;
                $ProjectTask->save();
                $counterForTask++;
            }

            // $ProjectActivity->save();
        }

        return redirect()->route('table')->with("success", "Project Added Successfully");
    }

}
