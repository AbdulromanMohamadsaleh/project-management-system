<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Holyday;
use App\Models\Category;
use App\Models\ProjectTask;
use App\Models\ProjectTeam;
use App\Models\ProjectTrack;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;
use App\Http\Requests\ProjectStoreRequest;
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

        $Categories = Category::all();

        $projectManagers = Login::where("POSITION", "project manager")->where("CONFIRM", 1)->get();
        $team = Login::all();
        return view('Admin.create', [
            'projectManagers' => $projectManagers,
            'team' => $team,
            'Holydays' => $Holydays,
            'Categories' => $Categories
        ]);
    }

    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();


        // dd($project_detail->activity);
        return view('Admin.show', ['project_detail' => $project_detail], ['TeamsName' => $project_detail->projectTeam]);
    }
    public function Timeline($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();

        $status = explode(',', $ProjectDetail->STATUS);

        return view('Admin.timeline', ['project_detail' => $ProjectDetail, 'status' => $status]);
    }

    public function Save(ProjectStoreRequest $request)
    {

        $validated = $request->validated();

        $ProjectDetial = new ProjectDetial();

        $projectCounter = ProjectDetial::count();
        $detail_id = date('y') . sprintf("%04d", ($projectCounter == 0 || $projectCounter == '' ? 1 : $projectCounter + 1));

        $counterId = 1;
        while (ProjectDetial::where('DETAIL_ID', $detail_id)->first()) {
            $detail_id = date('y') . sprintf("%04d", ($projectCounter == 0 || $projectCounter == '' ? 1 : $projectCounter + ++$counterId));
        }

        $ProjectDetial->DETAIL_ID = $detail_id;
        $ProjectDetial->NAME_PROJECT = $request->projectName;
        $ProjectDetial->REASONS = $request->reason;
        $ProjectDetial->OBJECTIVE = $request->objectve;
        $ProjectDetial->LOCATION = $request->location;
        $ProjectDetial->TARGET = $request->target;
        $ProjectDetial->RESULT = $request->expectedRresults;

        $ProjectDetial->DATE_START = $request->projectStart;
        $ProjectDetial->DATE_END = $request->projectEnd;
        $ProjectDetial->STATUS = "New Release,workingOn";
        $ProjectDetial->CATEGORY_ID = $request->category;

        $ProjectDetial->RECORD_CREATOR = $request->projectManager;
        $ProjectDetial->PROJECT_MANAGER = $request->projectManager;
        $ProjectDetial->BUDGET = $request->budget;
        $ProjectDetial->TOTAL_DATE = $request->projectDuration . " " . $request->projectDurationFormat;

        //$ProjectDetial->DATE_SAVE = $request->projectDuration;
        $ProjectDetial->save();
        $ProjectDetial = ProjectDetial::where('DETAIL_ID', $detail_id)->first();

        $ProjectDetial->projectTeam()->attach($request->projectTeam);

        // Create Project Tracker Table
        $ProjectTrack = new ProjectTrack();
        $trackCounter = ProjectTrack::count();
        $track_id = "PTR" . sprintf("%04d", ($trackCounter == 0 || $trackCounter == '' ? 1 : $trackCounter + 1));

        $counterId4 = 1;
        while (ProjectTrack::where('PROJECT_TRACK_ID', $track_id)->first()) {
            $track_id = "PTR" . sprintf("%04d", ($trackCounter == 0 || $trackCounter == '' ? 1 : $trackCounter + ++$counterId4));
        }
        $ProjectTrack->PROJECT_TRACK_ID = $track_id;
        $ProjectTrack->PROJECT_ID = $detail_id;
        $ProjectTrack->STATUS = 0;
        $ProjectTrack->timestamps = false;
        $ProjectTrack->save();



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
                $ActivityId = "ACT"  . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $projectCounter + ++$counterId2));
            }

            $ProjectActivity = new ProjectActivity(['ACTIVITY_ID' => $ActivityId]);
            $ProjectActivity->ACTIVITY_NAME = $activityName[$i];
            $ProjectActivity->DETAIL_ID = $ProjectDetial->DETAIL_ID;
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
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->update(['IS_APPROVE' => 1, 'STATUS' => 'New Release,Approved,workingOn']);
        return redirect()->back();
    }

    public function Delete($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->delete();
        return redirect()->back();
    }
}
