<?php

namespace App\Http\Controllers;

use App\Models\ProjectTask;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;

class TaskController extends Controller
{
    public function Complete($id)
    {
        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->STATUS = 1;
        $Task->COPLATE_TIME = date("Y/m/d");
        $Task->save();

        $completeTasksCounter = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->where('STATUS', 1)->get()->count();
        $totalTasks = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->count();

        if (($completeTasksCounter - 1) >= 0) {
            $Project = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->first();
            $Project->STATUS = "New Release,Approved,Progress,workingOn";
            $Project->save();
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

}
