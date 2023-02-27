<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ProjectTask;
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
        $Task->COPLETE_TIME = date("Y/m/d");
        // $Task->TASK_TRACKER =  Auth::user()->NAME . "," . date("y/m/d");
        $Task->COMPLETED_BY =  Auth::user()->LOGIN_ID;

        $Task->save();

        $completeTasksCounter = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->where('STATUS', 1)->get()->count();
        $totalTasks = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->count();



        $Project = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->first();

        if (($completeTasksCounter - 1) == 0) {
            $Task->activity->START_DATE = date("Y/m/d");
            $Task->activity->save();

            $Project->STATUS = 2;
            $Project->save();
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
        // $ProjectDetialg = ProjectTrack::where('PROJECT_ID', $Task->activity->DETAIL_ID)->first();

        $Project->PROJECT_PERCENTAGE = $precentage;
        $Project->save();

        if ($precentage == "100") {
            $Project->STATUS = 3;
            $Project->COMPLETE_DATE = date("y/m/d");
            $Project->save();

            // $ProjectTrack = ProjectTrack::where('PROJECT_ID', $Task->activity->DETAIL_ID)->first();
            // $ProjectTrack->TRACKER = 'New Release,Approved,Progress,Completed';
            // $ProjectTrack->STATUS = 3;
            // $ProjectTrack->save();
        }

        if ($completeTasksCounter == $totalTasks) {
            $Task->activity->END_DATE = date("Y/m/d");
            $Task->activity->STATUS = 1;
            $Task->activity->save();
        } else {
            $Task->activity->STATUS = 0;
            $Task->activity->save();
        }




        return redirect()->back();
    }

    public function Start($id)
    {

        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->START_DATE = date("Y/m/d");
        $Task->timestamps = false;
        $completeTasksCounter = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->where('STATUS', 1)->get()->count();

        if (($completeTasksCounter) == 0) {
            $Project = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->first();
            $Task->activity->START_DATE = date("Y/m/d");
            $Task->activity->save();

            $Project->STATUS = 2;
            $Project->save();
        }

        $Task->save();
        return redirect()->back();
    }


    public function ActivityTimeline($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();

        return view('project.show.activity_gantt_chart', ['project_detail' => $project_detail]);
    }

    public function Timeline($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('tasks', function ($q) {
            $q->orderBy('created_at', 'ASC')->get();
        })->first();

        // return view('project.show.task_timeline', ['tasks' => $project_detail->tasks, 'project' => $project_detail]);
        return view('project.show.timeline', ['tasks' => $project_detail->tasks, 'project' => $project_detail]);
    }

    public function SaveBudget(request $request, $id)
    {

        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->TASK_BUDGET = $request->budget;
        $Task->timestamps = false;
        $Task->save();
        return redirect()->back()->with("success", "Add Budget Successfully");
    }

    public function SaveNote(request $request, $id)
    {

        $Task = ProjectTask::where('TASK_ID', $id)->first();
        $Task->TASK_NOTE = $request->note;
        $Task->timestamps = false;
        $Task->save();
        return redirect()->back()->with("success", "Add Note Successfully");
    }

    public function EditTask(Request $request, $id)
    {
        $Task = ProjectTask::where('TASK_ID', $id)->first();
        // dd($request->all());
        $request->validate([
            'task' => 'required',
            'day' => 'required',
            'edit_satart_date' => 'required',
            // after:now
        ]);

        $Task->TASK_NAME = $request->task;
        $Task->DAY = $request->day;
        $Task->DAY = $request->day;
        $Task->START_DATE = $request->edit_satart_date;

        $Project = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->first();

        if ($Project->IS_APPROVE == 1) {
            $completeTasksCounter = ProjectTask::where('ACTIVITY_ID', $Task->activity->ACTIVITY_ID)->where('STATUS', 1)->get()->count();

            if (($completeTasksCounter) == 0) {
                $Project = ProjectDetial::where('DETAIL_ID', $Task->activity->DETAIL_ID)->first();
                $Task->activity->START_DATE = date("Y/m/d");
                $Task->activity->save();

                $Project->STATUS = 2;
                $Project->save();
            }

            $Task->COPLETE_TIME = $request->Expected_End_Date;
        }


        $Task->save();

        return redirect()->back()->with("success", "Edit Task and Day Successfully");
    }

    public function DelateTask($id)
    {
        $Task = ProjectTask::where('TASK_ID', $id)->delete();


        return redirect()->back()->with("success", "Delete task Successfully");
    }

    public function SaveOrder(Request $request)
    {
        // $request->validate([
        //     'create_holyday_name' => 'required|min:2|max:50',
        //     'create_date_holyday' => 'required|date', // after:now
        // ]);

        $tasks = json_decode($request->data);

        foreach ($tasks as $act) {

            $Task = ProjectTask::where('TASK_ID', $act->taskId)->first();

            // Getting values from the blade template form
            $Task->TASK_ORDER = $act->order;
            // $Holyday->CATEGORY_ID = $id;
            $Task->timestamps = false;
            $Task->save();
        }
        return response()->json([
            "success" => "Task Updated Successfully", 'status' => 'success',
            'response_code' => 200,
            // 'data' => $Holyday->toJson()
        ]);
    }

    public function Payment($id)
    {
        if (Auth::user()->POSITION !== "Employee" && Auth::user()->POSITION !== "Project Manager") {
            return redirect()->back()->withErrors("You Dont Have The Permissiont To Make This Action");
            die();
        }


        $tasks = ProjectTask::where('TASK_ID', $id)->update(['STATUS_PAYMENT' => 1, 'DATE_PAYMENT' => date("Y-m-d"), 'USER_PAYMENT' =>  Auth::user()->LOGIN_ID]);

        return redirect()->back()->with("success", "Payment Successfully");;
    }
}
