<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Holyday;
use App\Models\ProjectTask;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;
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
        $Holydays = Holyday::all()->toJson();


        $projectManagers = Login::where("POSITION", "project manager")->where("CONFIRM", 1)->get();
        $team = Login::all();
        return view('Admin.create', [
            'projectManagers' => $projectManagers,
            'team' => $team,
            'Holydays' => $Holydays
        ]);
    }

    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();

        $sum=0;
        foreach($project_detail->activity as $act){

            foreach($act->tasks as $task){
                $sum += intval($task->DAY);
            }
            $project_detail->activity->d= $sum;
            $sum=0;
        }

        // dd($project_detail->activity);
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

            $ActivityCounter = ProjectActivity::count();

            $ActivityId = "ACT" . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $ActivityCounter + 1));

            $ProjectActivity = new ProjectActivity(['ACTIVITY_ID' => $ActivityId]);
            $ProjectActivity->ACTIVITY_NAME = $activityName[$i];
            $ProjectActivity->DETAIL_ID = $ProjectDetial->DETAIL_ID;
            $ProjectActivity->DAY_WEEK = $request->projectDuration;
            $ProjectActivity->ACTIVITY_ORDER = $i + 1;

            for ($j = 0; $j < $taskCounter[$i]; $j++) {

                $TaskCounter = ProjectTask::count();
                $tskId = "TASK" . sprintf("%04d", ($TaskCounter == 0 || $TaskCounter == '' ? 1 : $TaskCounter + 1));

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
    public function Delete($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->delete();
        return redirect()->back();

    }
}
