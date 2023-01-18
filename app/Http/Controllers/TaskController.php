<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ProjectTask;
use App\Models\ProjectTrack;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function Complete($id)
    {
        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->STATUS = 1;
        $Task->COPLATE_TIME = date("Y/m/d");
        $Task->TASK_TRACKER =  Auth::user()->NAME . "," . date("y/m/d");
        $Task->save();

        $completeTasksCounter = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->where('STATUS', 1)->get()->count();
        $totalTasks = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->count();



        $Project = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->first();

        if (($completeTasksCounter - 1) >= 0) {
            $Project->STATUS = "New Release,Approved,Progress,workingOn";
            $Project->save();

            $ProjectTrack = ProjectTrack::where('PROJECT_ID', $Task->activity->DETAIL_ID)->first();
            $ProjectTrack->TRACKER = 'New Release,Approved,Progress,workingOn';
            $ProjectTrack->STATUS = 2;
            $ProjectTrack->save();
        }

        // Calculate Precentage
        $totalTaskOfTheProject = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->with("tasks")->first();

        $totalCompleteTaskOfTheProject = 0;

        foreach ($totalTaskOfTheProject->tasks as $task) {
            if ($task->STATUS == 1)
                $totalCompleteTaskOfTheProject++;
        }

        $totalTaskOfTheProject = $totalTaskOfTheProject->tasks->count();

        // $totalTaskOfTheProject->tasks->count();
        // dd($totalTaskOfTheProject);
        $precentage = floor(($totalCompleteTaskOfTheProject * 100) / $totalTaskOfTheProject);
        $ProjectDetialg = ProjectTrack::where('PROJECT_ID', $Task->activity->DETAIL_ID)->first();

        $ProjectDetialg->PROJECT_PERCENTAGE = $precentage;
        $ProjectDetialg->save();

        if ($precentage == "100") {
            $Project->STATUS = "New Release,Approved,Progress,Completed";
            $Project->save();

            $ProjectTrack = ProjectTrack::where('PROJECT_ID', $Task->activity->DETAIL_ID)->first();
            $ProjectTrack->TRACKER = 'New Release,Approved,Progress,Completed';
            $ProjectTrack->STATUS = 3;
            $ProjectTrack->save();
        }

        if ($completeTasksCounter == $totalTasks) {

            $Task->activity->STATUS = 1;
            $Task->activity->save();
        } else {
            $Task->activity->STATUS = 0;
            $Task->activity->save();
        }




        return redirect()->back();
    }
    public function Create()
    {
        return view('Admin.addholyday');
    }
    public function SaveBudget(request $request,$id)
    {

        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->TASK_BUDGET = $request->budget;
        $Task->timestamps = false;
        $Task->save();
        return redirect()->back();
    }

    // public function Update(Request $request, $id)
    // {
    //     $request->validate([
    //         'holyday_name' => 'required',
    //         'date_holyday' => 'required',
    //     ]);

    //     $Holyday = Holyday::where('HOLYDAY_ID', $id)->first();
    //     // Getting values from the blade template form
    //     $Holyday->HOLYDAY_NAME = $request->holyday_name;
    //     $Holyday->HOLYDAY_DATE = $request->date_holyday;
    //     // $Holyday->CATEGORY_ID = $id;
    //     $Holyday->timestamps = false;
    //     $Holyday->update();
    //     return redirect()->back();
    // }
}
