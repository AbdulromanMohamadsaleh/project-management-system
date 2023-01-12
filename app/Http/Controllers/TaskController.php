<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ProjectTask;
use App\Models\ProjectTrack;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;
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
            $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->update(['TRACKER' => 'New Release,Approved,Progress,workingOn', 'STATUS' => 2]);

            $Project->save();
        }

        // Calculate Precentage
        // $totalTaskOfTheProject = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->with("tasks")->first();
        // $totalTaskOfTheProject = $totalTaskOfTheProject->tasks->count();

        // $totalCompleteTaskOfTheProject = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->with("tasks",function($q){
        //     $q->where('STATUS', 1)->get();
        // })->first();

        // $totalTaskOfTheProject->tasks->count();
        // dd($totalCompleteTaskOfTheProject->count());
        // $precentage = floor(($totalCompleteTaskOfTheProject * 100) / $totalTaskOfTheProject);
        // $ProjectDetialg = ProjectTrack::where('PROJECT_ID', $Task->activity->DETAIL_ID)->first();

        // $ProjectDetialg->PROJECT_PERCENTAGE = $precentage;
        // $ProjectDetialg->save();

        if ($completeTasksCounter == $totalTasks) {
            $Project->STATUS = "New Release,Approved,Progress,Complete";
            $Project->save();
            // $Task->activity->STATUS = 1;
            // $Task->activity->save();
        } else {
            // $Task->activity->STATUS = 0;
            // $Task->activity->save();
        }




        return redirect()->back();
    }
}
