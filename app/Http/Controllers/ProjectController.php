<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectTeam;
use App\Models\Login;
use App\Models\ProjectActivity;
use App\Models\ProjectTask;
use SebastianBergmann\LinesOfCode\Counter;

class ProjectController extends Controller
{
    public function Index()
    {
        return view('Admin.index');
    }
    public function Table()
    {
        $project_details = ProjectDetial::orderBy('DETAIL_ID', 'DESC')->get();
        return view('Admin.table', ['project_details' => $project_details]);
    }
    public function Create()
    {
        $projectManagers = Login::where("POSITION", "project manager")->where("CONFIRM", 1)->get();
        $team = Login::all();
        return view('Admin.create', ['projectManagers' => $projectManagers, 'team' => $team]);
    }
    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->first();
        $ProjectTeam = ProjectTeam::where('DETAIL_ID', $id);
        $Login = Login::all();
        return view('Admin.show', ['project_detail' => $project_detail], ['TeamsName' => $ProjectTeam]);
    }


    public function Save(request $request)
    {
        $ProjectDetial = new ProjectDetial();

        $projectCounter = ProjectDetial::count();
        $ProjectDetial->DETAIL_ID = date('y') . sprintf("%04d", ($projectCounter == 0 || $projectCounter == '' ? 1 : $projectCounter + 1));
        $ProjectDetial->NAME_PROJECT = $request->projectName;
        $ProjectDetial->REASONS = $request->reason;
        $ProjectDetial->OBJECTIVE = $request->objectve;
        $ProjectDetial->LOCATION = $request->location;
        $ProjectDetial->TARGET = $request->target;
        $ProjectDetial->RESULT = $request->expectedRresults;
        $ProjectDetial->DATE_START = $request->projectStart;
        $ProjectDetial->DATE_END = $request->projectEnd;
        $ProjectDetial->RECORD_CREATOR = $request->projectManager;
        $ProjectDetial->PROJECT_MANAGER = rand(2, 5500);
        $ProjectDetial->BUDGET = $request->budget;
        // $ProjectDetial->DATE_SAVE = $request->projectDuration;

        $ProjectDetial->save();


        // Save Activity & Tasks
        $activityName = $request->activityName;
        $taskName = $request->taskName;
        $taskCounter = $request->taskCounter;

        $counter = 0;
        for ($i = 0; $i < count($activityName); $i++) {
            $ProjectActivity = new ProjectActivity();
            $ProjectActivity->ACTIVITY_NAME = $activityName[$i];
            $ProjectActivity->DETAIL_ID = $ProjectDetial->DETAIL_ID;
            $ProjectActivity->ACTIVITY_ID  = $i + rand(0, 5000);

            // dd($ProjectActivity->ACTIVITY_ID);
            for ($j = 0; $j < $taskCounter[$i]; $j++) {
                $ProjectTask = new ProjectTask();
                $ProjectTask->TASK_NAME = $taskName[$counter++];
                $ProjectTask->ACTIVITY_ID = $ProjectActivity->ACTIVITY_ID;
                $ProjectTask->save();
            }
            $ProjectActivity->save();
        }
    }
    public function Approve($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID',$id)->first();
        $ProjectTeam = ProjectTeam::where('DETAIL_ID',$id);
        $Login = Login::all();
        return view('Admin.approve', ['project_detail' => $project_detail],['TeamsName' => $ProjectTeam]);
    }
}
