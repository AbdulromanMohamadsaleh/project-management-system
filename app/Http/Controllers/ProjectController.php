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
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->with('tasks')->get();
        })->first();

        return view('Admin.show', ['project_detail' => $project_detail], ['TeamsName' => $project_detail->projectTeam]);
    }
    public function Timeline()
    {

        return view('Admin.timeline');
    }

    public function Save(request $request)
    {

        $ProjectDetial = new ProjectDetial();

        $projectCounter = ProjectDetial::count();
        $detail_id = date('y') . sprintf("%04d", ($projectCounter == 0 || $projectCounter == '' ? 1 : $projectCounter + 1));
        $ProjectDetial->DETAIL_ID = $detail_id;
        $ProjectDetial->NAME_PROJECT = $request->projectName;
        $ProjectDetial->REASONS = $request->reason;
        $ProjectDetial->OBJECTIVE = $request->objectve;
        $ProjectDetial->LOCATION = $request->location;
        $ProjectDetial->TARGET = $request->target;
        $ProjectDetial->RESULT = $request->expectedRresults;
        $ProjectDetial->DATE_START = $request->projectStart;
        $ProjectDetial->DATE_END = $request->projectEnd;
        $ProjectDetial->RECORD_CREATOR = $request->projectManager;
        $ProjectDetial->PROJECT_MANAGER = $request->projectManager;
        $ProjectDetial->BUDGET = $request->budget;
        $ProjectDetial->TOTAL_DATE = 0;

        //$ProjectDetial->DATE_SAVE = $request->projectDuration;
        $ProjectDetial->save();

        $ProjectDetial->projectTeam()->attach($request->projectTeam);

        // Save Activity & Tasks
        $activityName = $request->activityName;
        $taskName = $request->taskName;
        $taskCounter = $request->taskCounter;
        $taskDuration = $request->taskDuration;

        $counter = 0;

        for ($i = 0; $i < count($activityName); $i++) {
            $ProjectActivity = new ProjectActivity();
            $ProjectActivity->ACTIVITY_NAME = $activityName[$i];
            $ProjectActivity->DETAIL_ID = $ProjectDetial->DETAIL_ID;
            $ProjectActivity->ACTIVITY_ID  = $i + rand(0, 5000);
            $ProjectActivity->DAY_WEEK = $request->projectDuration;

            for ($j = 0; $j < $taskCounter[$i]; $j++) {

                $TaskCounter = ProjectTask::count();
                $tskId = "PRJ" . sprintf("%04d", ($TaskCounter == 0 || $TaskCounter == '' ? 1 : $TaskCounter + 1));

                $ProjectTask = new ProjectTask(['TASK_ID' => $tskId]);

                $ProjectTask->TASK_NAME = $taskName[$counter];
                $ProjectTask->DAY = $taskDuration[$counter];
                $ProjectTask->ACTIVITY_ID = $ProjectActivity->ACTIVITY_ID;
                $ProjectTask->save();
                $counter++;
            }

            $ProjectActivity->save();
        }

        return redirect()->route('table');
    }
    public function Approve()
    {
        $project_details = ProjectDetial::all();
        // $ProjectTeam = ProjectTeam::where('DETAIL_ID', $id);
        // $Login = Login::all();
        return view('Admin.approve', ['project_details' => $project_details]);
    }

    public function Done($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->update(['IS_APPROVE' => 1, 'STATUS' => 'Progress']);
        return redirect()->back();
    }
}
