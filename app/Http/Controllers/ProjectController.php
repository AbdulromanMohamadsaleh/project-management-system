<?php

namespace App\Http\Controllers;

use Phattarachai\LineNotify\Facade\Line;
use App\Models\User;

use App\Models\Holyday;
use App\Models\Category;
use App\Models\ProjectTask;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectActivity;
use App\Traits\LastProjectTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use DateTime;

class ProjectController extends Controller
{
    use LastProjectTrait;

    public function Index()
    {

        return view('Admin.index');
    }

    public function Table()
    {
        if (Auth::user()->Privilege->PRI_NAME == 'Employee' || Auth::user()->Privilege->PRI_NAME == 'Project Manager') {
            $user = User::where('LOGIN_ID', Auth::user()->LOGIN_ID)->with('projects', function ($q) {
                $q->where('IS_APPROVE', 1)->with('Approver')->get();
            })->first();

            $project_details = $user->projects;
        } else {
            $project_details = ProjectDetial::orderBy('DETAIL_ID', 'DESC')->get();
        }

        $routeName = $this->getRouteName();
        $data['last']  = $this->getLastProject();

        return view('Admin.table', ['project_details' => $project_details, 'data' => $data, 'routename' => $routeName]);
    }

    public function Create()
    {
        $Holydays = Holyday::all()->toJson();
        $Categories = Category::all();
        $projectManagers = User::where("STATUS", 1)->with("Profile")->whereRelation('Profile', 'POS_ID', '=', '03')->get();

        $routeName = $this->getRouteName();
        $team = User::where("STATUS", 1)->get();
        $data['last']  = $this->getLastProject();
        return view('Admin.create', [
            'projectManagers' => $projectManagers,
            'team' => $team,
            'Holydays' => $Holydays,
            'Categories' => $Categories,
            'data' => $data, 'routename' => $routeName
        ]);
    }

    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ORDER')->with('tasks', function ($q) {
                $q->with("assignedUser", function ($q) {
                    $q->select('prj_assigned_task.LOGIN_ID');
                })->orderBy('TASK_ORDER')->orderBy('created_at', 'ASC')->get();
            })->orderBy('created_at', 'ASC')->get();
        })->first();


        $sum = 0;
        $totalBudget = 0;
        $paidBudget = 0;
        $BudgetActivityNotPaid = 0;
        foreach ($project_detail->activity as $act) {

            $Syear = intval(date('Y', strtotime($act->START_DATE)));
            $Smonth = intval(date('m', strtotime($act->START_DATE)));
            $Sday = intval(date('d', strtotime($act->START_DATE)));

            if ($act->END_DATE) {
                $Eyear = intval(date('Y', strtotime($act->END_DATE)));
                $Emonth = intval(date('m', strtotime($act->END_DATE)));
                $Eday = intval(date('d', strtotime($act->END_DATE)));
            }

            foreach ($act->tasks as $task) {
                $task->assignedUser = array_column($task->assignedUser->toArray(), 'LOGIN_ID');
                $totalBudget += $task->TASK_BUDGET;
                $sum += intval($task->DAY);
                if ($task->STATUS_PAYMENT == 1) {
                    $paidBudget += $task->TASK_BUDGET;
                }
                if ($task->STATUS_PAYMENT == 0) {
                    $BudgetActivityNotPaid += $task->TASK_BUDGET;
                }
            }
        }



        $project_detail->BudgetActivityNotPaid = $BudgetActivityNotPaid;
        $project_detail->paidBudget = $paidBudget;
        $project_detail->TotalDays = $sum;
        $project_detail->TotalBudget = $totalBudget;
        $Holydays = Holyday::all()->toJson();
        $data['last']  = $this->getLastProject();
        $routeName = $this->getRouteName();
        return view('Admin.show', [
            'project_detail' => $project_detail,
            'Holydays' => $Holydays,
            'TeamsName' => $project_detail->projectTeam,
            'data' => $data,
            'routename' => $routeName,
        ]);
    }

    public function Timeline($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->with('Approver')->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();

        if ($ProjectDetail->STATUS == 4) {
            abort(404);
        } else {

            $data['last']  = $this->getLastProject();
            $routeName = $this->getRouteName();

            return view('Admin.timeline', ['project_detail' => $ProjectDetail, 'data' => $data, 'routename' => $routeName]);
        }
    }

    public function Save(Request $request)
    {
        $projectTeam = $request->projectTeam;
        if ($projectTeam) {
            if (!in_array($request->projectManager, $projectTeam)) {

                array_push($projectTeam, $request->projectManager);
            }
        }

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
        $ProjectDetial->STATUS = 0;
        $ProjectDetial->CATEGORY_ID = $request->category;
        $ProjectDetial->RECORD_CREATOR = Auth::user()->LOGIN_ID;
        $ProjectDetial->PROJECT_MANAGER = $request->projectManager;
        $ProjectDetial->BUDGET = $request->budget;
        $ProjectDetial->TOTAL_DATE = $request->projectDuration;

        $this->getProjectDurationFormat($request, $ProjectDetial);

        $ProjectDetial->save();
        $ProjectDetial = ProjectDetial::where('DETAIL_ID', $detail_id)->first();
        $ProjectDetial->projectTeam()->attach($projectTeam);

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
        }

        $name = $ProjectDetial->ProjectCreator->NAME;
        $sMessage = "Detail\n";
        $sMessage .= "ID_Project:" . "$detail_id" . "\n";
        $sMessage .= "NameProject: " . " $request->projectName" . "\n";
        $sMessage .= "NameRecord:" . "$name" . "\n";
        $sMessage .= "ProjectStart: " . "$request->projectStart" . "\n";
        $sMessage .= "ProjectEnd:" . " $request->projectEnd" . "\n";
        $sMessage .= "Status: " . "New Release" . "\n";
        Line::send('' . '' . $sMessage);
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
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->first();

        if (Auth::user()->Privilege->PRI_NAME != "Manager" || $ProjectDetail->STATUS == 4) {
            return redirect()->back()->withErrors("You Dont Have The Permissiont To Make This Action");
            die();
        }

        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->update(['IS_APPROVE' => 1, 'STATUS' => 1, 'APPROVED_BY' => Auth::user()->LOGIN_ID, 'APPROVED_DATE' => date("y/m/d")]);

        $nameProject =  $ProjectDetail->NAME_PROJECT;

        $dateApprove = new DateTime();
        $name = $ProjectDetail->ProjectCreator->NAME;

        $ProjectStart = strtotime($ProjectDetail->DATE_START);
        $ProjectStart = date('d-m-Y', $ProjectStart);

        $ProjectEnd = strtotime($ProjectDetail->DATE_END);
        $ProjectEnd = date('d-m-Y', $ProjectEnd);

        $sMessage = "Approved\n";
        $sMessage .= "ID_Project:" . "$id" . "\n";
        $sMessage .= "NameProject: " . " $nameProject" . "\n";
        $sMessage .= "NameRecord:" . "$name" . "\n";
        $sMessage .= "ProjectStart: " . " $ProjectStart " . "\n";
        $sMessage .= "ProjectEnd:" . " $ProjectEnd" . "\n";
        $sMessage .= "Approve by:" . Auth::user()->NAME . "\n";
        $sMessage .= "Approve Date:" .  $dateApprove->format('d-m-Y') . "\n";
        $sMessage .= "Status: " . "Approved" . "\n";
        Line::send('' . '' . $sMessage);

        return redirect()->back()->with("success", "Project Appreoved Successfully");;
    }

    public function Cancel($id)
    {
        if (Auth::user()->Privilege->PRI_NAME != "Manager" && Auth::user()->Privilege->PRI_NAME != "Admin") {
            return redirect()->back()->withErrors("You Dont Have The Permissiont To Make This Action");
            die();
        }

        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->update(['STATUS' => 4]);

        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->first();
        $nameProject =  $ProjectDetail->NAME_PROJECT;

        $sMessage = "Approved\n";
        $sMessage .= "ID_Project:" . "$id" . "\n";
        $sMessage .= "NameProject: " . " $nameProject" . "\n";
        $sMessage .= "Status: " . "Canceled" . "\n";
        Line::send('' . '' . $sMessage);

        return redirect()->back()->with("success", "Project Canceled Successfully");;
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
        $projectManagers = User::where("STATUS", 1)->with("Profile")->whereRelation('Profile', 'POS_ID', '=', '03')->get();
        $team = User::where("STATUS", 1)->get;
        $projectTeams = $ProjectDetial->projectTeam->pluck('LOGIN_ID')->toArray();
        $routeName = $this->getRouteName();


        $data['last']  = $this->getLastProject();
        return view('Admin.edit', [
            'projectManagers' => $projectManagers,
            'project_detail' => $ProjectDetial,
            'team' => $team,
            'Holydays' => $Holydays,
            'Categories' => $Categories,
            'projectTeams' => $projectTeams,
            'data' => $data,
            'routename' => $routeName
        ]);
    }

    public function Update(Request $request, $id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->first();

        if (!$ProjectDetail) {
            return redirect()->back();
        }
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
        $ProjectDetail->TOTAL_DATE = $request->projectDuration;


        $this->getProjectDurationFormat($request, $ProjectDetail);

        $ProjectDetail->save();

        $ProjectDetial = ProjectDetial::where('DETAIL_ID', $ProjectDetail->DETAIL_ID)->first();

        $projectTeam = $request->projectTeam;
        if ($projectTeam) {
            if (!in_array($request->projectManager, $projectTeam)) {

                array_push($projectTeam, $request->projectManager);
            }
        }

        $ProjectDetial->projectTeam()->sync($projectTeam);

        return redirect()->route('show', $id)->with("success", "Project Edited Successfully");
    }

    public function ValidateProjectName(Request $request)
    {
        $ProjectName = ProjectDetial::where('NAME_PROJECT', $request->projectName)->get();

        if (count($ProjectName) > 0) {
            return response()->json(['msg' => 'The project name has already been taken.', 'status' => 0]);
        }

        return response()->json(['msg' => 'Vaild Name.', 'status' => 1]);
    }

    public function GanttChart($id)
    {
        #####  Update  #####
        $project_detail2 = ProjectDetial::select(['DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS'])->where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->select('ACTIVITY_ID', 'ACTIVITY_NAME', 'prj_project_activity.START_DATE', 'END_DATE', 'DETAIL_ID', 'ACTIVITY_ORDER')
                ->with('tasks', function ($q2) {
                    $q2->select('TASK_ID', 'TASK_NAME', 'START_DATE', 'prj_activity_task.END_DATE', 'COPLETE_TIME', 'TASK_ORDER', 'ACTIVITY_ID', "STATUS")->where('END_DATE', 'IS NOT', null)->orderBy('TASK_ORDER')->get();
                })->orderBy('ACTIVITY_ORDER')->get();
        })->first();

        if (!$project_detail2) {
            abort(404);
        }


        $tasks = $project_detail2->tasks->toArray();
        $project_detail2 = json_encode($project_detail2->toArray());
        $tasks = json_encode($tasks);

        $data['last']  = $this->getLastProject();

        $routeName = $this->getRouteName();
        return view('testChart.index', ['project' => $project_detail2, 'tasks' => $tasks, 'data' => $data, 'routename' => $routeName]);
    }

    public function ConvertTimestampToDateStringFormate($date)
    {
        $newdate = explode(" ", $date);
        return str_replace("-", "/", $newdate[0]);
    }

    public function getProjectDurationFormat($request, $ProjectDetial)
    {
        if ($request->projectDurationFormat == "day")
            $ProjectDetial->DURATION_TYPE = 0;
        else if ($request->projectDurationFormat == "week")
            $ProjectDetial->DURATION_TYPE = 1;

        if ($request->isIncludeHolyday == "no")
            $ProjectDetial->INC_HOLIDAY = 0;
        else if ($request->isIncludeHolyday == "yes")
            $ProjectDetial->INC_HOLIDAY = 1;

        if ($request->isIncludeWeekend == "no")
            $ProjectDetial->INC_WEEKEND = 0;
        else if ($request->isIncludeWeekend == "yes")
            $ProjectDetial->INC_WEEKEND = 1;
    }

    public function CancelAction($ProjectDetail)
    {
    }
}
