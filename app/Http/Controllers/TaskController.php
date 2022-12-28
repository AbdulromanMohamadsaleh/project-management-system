<?php

namespace App\Http\Controllers;

use App\Models\ProjectTask;
use Illuminate\Http\Request;
use App\Models\ProjectActivity;

class TaskController extends Controller
{
    public function Complete($id)
    {
        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->STATUS = 1;
        $Task->COPLATE_TIME = date("Y/m/d");
        $Task->save();

        $completeTasksCounter = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->where('STATUS', 1)->get();
        $totalTasks = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->count();

        if ($completeTasksCounter->count() == $totalTasks) {
            $Task->activity->STATUS = 1;
            $Task->activity->save();
        } else {
            $Task->activity->STATUS = 0;
            $Task->activity->save();
        }




        return redirect()->back();
    }
}
