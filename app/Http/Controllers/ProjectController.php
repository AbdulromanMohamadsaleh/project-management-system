<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\Login;
use App\Models\Holyday;
use App\Models\Category;
use App\Models\ProjectTask;
use App\Models\ProjectTeam;
use App\Models\ProjectTrack;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;
use App\Traits\LastProjectTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\LinesOfCode\Counter;

class ProjectController extends Controller
{
    use LastProjectTrait;
    public function Index()
    {

        return view('Admin.index');
    }

    public function Table()
    {
        if(Auth::user()->POSITION == 'Project Manager'){
            $project_details = ProjectDetial::where('PROJECT_MANAGER',Auth::user()->LOGIN_ID)->orderBy('DETAIL_ID', 'DESC')->with(['track' => function ($q) {
                $q->select('PROJECT_ID', 'PROJECT_PERCENTAGE');
            }])->get();

        }else{
            $project_details = ProjectDetial::orderBy('DETAIL_ID', 'DESC')->with(['track' => function ($q) {
                $q->select('PROJECT_ID', 'PROJECT_PERCENTAGE');
            }])->get();
        }


        // if (session('success')) {
        //     // Alert::toast('Toast Message', 'Success');
        //     Alert::success('Success!', 'Project Created Successfully');
        // }
        $route = Route::current();
        $name = $route->getName();
        $data['last']  = $this->getLastProject();
        return view('Admin.table', ['project_details' => $project_details, 'data' => $data,'routename'=>$name]);
    }

    public function Create()
    {
        $Holydays = Holyday::all()->toJson();

        $Categories = Category::all();

        $projectManagers = User::where("POSITION", 2)->where("IS_ACTIVE", 1)->get();
        $route = Route::current();
        $name = $route->getName();


        $team = User::all();
        $data['last']  = $this->getLastProject();
        return view('Admin.create', [
            'projectManagers' => $projectManagers,
            'team' => $team,
            'Holydays' => $Holydays,
            'Categories' => $Categories,
            'data' => $data, 'routename'=>$name
        ]);
    }

    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ORDER')->with('tasks', function ($q) {
                $q->orderBy('TASK_ORDER')->orderBy('created_at', 'ASC')->get();
            })->orderBy('created_at', 'ASC')->get();
        })->first();

        $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();

        $status = explode(',', $ProjectTrack->TRACKER);

        // dd($project_detail->activity);
        $sum = 0;
        $totalBudget = 0;
        foreach ($project_detail->activity as $act) {

            // dd(intval(date('m', strtotime($act->START_DATE))));

            $Syear = intval(date('Y', strtotime($act->START_DATE)));
            $Smonth = intval(date('m', strtotime($act->START_DATE)));
            $Sday = intval(date('d', strtotime($act->START_DATE)));

            if ($act->END_DATE) {

                $Eyear = intval(date('Y', strtotime($act->END_DATE)));
                $Emonth = intval(date('m', strtotime($act->END_DATE)));
                $Eday = intval(date('d', strtotime($act->END_DATE)));
                // dd($Syear, $Smonth, $Sday, $Eyear, $Emonth, $Eday);
            }

            // dd($Syear, $Smonth, $Sday, $Eyear, $Emonth, $Eday);
            foreach ($act->tasks as $task) {
                $totalBudget += $task->TASK_BUDGET;
                $sum += intval($task->DAY);
            }
        }


        $project_detail->TotalDays = $sum;
        $project_detail->TotalBudget = $totalBudget;
        $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();
        $status = explode(',', $project_detail->STATUS);


        $Holydays = Holyday::all()->toJson();



        // $project = ProjectDetial::where('DETAIL_ID', $id)->with('tasks', function ($q) {
        //     $q->select(['TASK_ID as id', 'TASK_NAME as name', 'prj_activity_task.START_DATE as start', 'COPLATE_TIME as end', 'prj_activity_task.created_at'])->orderBy('created_at', 'ASC')->get();
        // })->first();

        // $tasks = $project->tasks->toArray();
        $data['last']  = $this->getLastProject();
        // $tasks = json_encode($tasks);

        return view('Admin.show', [
            'project_detail' => $project_detail,
            'Holydays' => $Holydays,
            'status' => $status,
            'TeamsName' => $project_detail->projectTeam,
            'ProjectTrack' => $ProjectTrack,
            'data' => $data,
            // 'tasks' => $tasks,
            // 'project' => $project
        ]);

        // return view('Admin.show', ['project_detail' => $project_detail, 'status' => $status, 'TeamsName' => $project_detail->projectTeam, 'ProjectTrack' => $ProjectTrack]);

    }

    public function Timeline($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();

        $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();

        $status = explode(',', $ProjectDetail->STATUS);
        $data['last']  = $this->getLastProject();
        return view('Admin.timeline', ['project_detail' => $ProjectDetail, 'ProjectTrack' => $ProjectTrack, 'status' => $status, 'data' => $data]);
    }

    public function Save(Request $request)
    {

        // $validated = $request->validated();

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

        $ProjectDetial->RECORD_CREATOR = Auth::user()->LOGIN_ID;
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
                $ActivityId = "ACT"  . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $ActivityCounter + ++$counterId2));
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

        return redirect()->route('table')->with("success", "Project Added Successfully");
    }

    public function Approve()
    {
        $project_details = ProjectDetial::all();
        $data['last']  = $this->getLastProject();
        return view('Admin.approve', ['project_details' => $project_details, 'data' => $data]);
    }

    public function Done($id)
    {
        if (Auth::user()->POSITION !== "Manager") {
            return redirect()->back()->withErrors("You Dont Have The Permissiont To Make This Action");
            die();
        }

        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->update(['IS_APPROVE' => 1, 'STATUS' => 'New Release,Approved,workingOn']);

        $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->update(['TRACKER' => 'New Release,Approved,workingOn', 'STATUS' => 1, 'APPROVED_BY' => Auth::user()->NAME . "," . date("y/m/d")]);

        return redirect()->back()->with("success", "Project Appreoved Successfully");;
    }

    public function Delete($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->delete();
        return redirect()->back()->with("success", "Project Deleted Successfully");
    }

    public function Edit(ProjectDetial $ProjectDetial)
    {
        $Categories = Category::all();
        $Holydays = Holyday::all()->toJson();
        $projectManagers = User::where("POSITION", 3)->where("IS_ACTIVE", 1)->get();

        $team = User::all();

        // $subset = $ProjectDetial->projectTeam->map(function ($projectTeam) {
        //     return $projectTeam->only(['LOGIN_ID']);
        // });
        $projectTeams = $ProjectDetial->projectTeam->pluck('LOGIN_ID')->toArray();


        $data['last']  = $this->getLastProject();
        return view('Admin.edit', [
            'projectManagers' => $projectManagers,
            'project_detail' => $ProjectDetial,
            'team' => $team,
            'Holydays' => $Holydays,
            'Categories' => $Categories,
            'projectTeams' => $projectTeams,
            'data' => $data,
        ]);
    }


    public function Update(Request $request, $id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->first();

        $ProjectDetail->NAME_PROJECT = $request->projectName;
        $ProjectDetail->REASONS = $request->reason;
        $ProjectDetail->OBJECTIVE = $request->objectve;
        $ProjectDetail->LOCATION = $request->location;
        $ProjectDetail->TARGET = $request->target;
        $ProjectDetail->RESULT = $request->expectedRresults;

        $ProjectDetail->DATE_START = $request->projectStart;
        $ProjectDetail->DATE_END = $request->projectEnd;
        $ProjectDetail->CATEGORY_ID = $request->category;

        $ProjectDetail->PROJECT_MANAGER = $request->projectManager;
        $ProjectDetail->BUDGET = $request->budget;
        $ProjectDetail->TOTAL_DATE = $request->projectDuration . " " . $request->projectDurationFormat;

        $ProjectDetail->save();

        $ProjectDetial = ProjectDetial::where('DETAIL_ID', $ProjectDetail->DETAIL_ID)->first();

        $ProjectDetial->projectTeam()->attach($request->projectTeam);

        return redirect()->back()->with("success", "Project Edited Successfully");
    }


    public function ValidateProjectName(Request $request)
    {
        // $request->validate([
        //     'projectName' => 'required|unique:prj_detail,NAME_PROJECT',
        //     'reason' => 'string|min:10',
        //     'objectve' => 'string|min:10',
        //     'location' => 'string',
        //     'target' => 'string|min:10',
        //     'expectedRresults' => 'string|min:10',
        //     'projectStart' => 'date',
        //     'projectEnd' => 'date|after:projectStart',
        //     'category' => 'exists:prj_category,CATEGORY_ID',
        //     'projectManager' => 'exists:prj_project_login,LOGIN_ID',
        // ]);

        $ProjectName = ProjectDetial::where('NAME_PROJECT', $request->projectName)->get();

        if (count($ProjectName) > 0) {
            return response()->json(['msg' => 'The project name has already been taken.', 'status' => 0]);
        }

        return response()->json(['msg' => 'Vaild Name.', 'status' => 1]);
    }




    public function GanttChart($id)
    {
        // $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
        //     $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        // })->first();

        // $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();

        // $status = explode(',', $ProjectDetail->STATUS);

        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('tasks', function ($q) {
            $q->select(['TASK_ID as id', 'TASK_NAME as name', 'prj_activity_task.START_DATE as start', 'COPLATE_TIME as end', 'prj_activity_task.created_at'])->orderBy('created_at', 'ASC')->get();
        })->first();



        $tasks = $project_detail->tasks->toArray();

        $tasks = json_encode($tasks);
        $data['last']  = $this->getLastProject();
        return view('testChart.index2', ['tasks' => $tasks, 'project' => $project_detail, 'data' => $data]);
    }

    public function ConvertTimestampToDateStringFormate($date)
    {
        $newdate = explode(" ", $date);
        return str_replace("-", "/", $newdate[0]);
    }
    // public function ValidateProjectAJAX(ProjectStoreRequest $request)
    // {

    // }






    // Custom Functions

}
