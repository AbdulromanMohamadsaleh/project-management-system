<?php

namespace App\Http\Controllers;

use Phattarachai\LineNotify\Facade\Line;
use App\Models\User;
// use App\Models\Login;
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
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
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
        if (Auth::user()->POSITION == 'Project Manager') {
            $project_details = ProjectDetial::where('PROJECT_MANAGER', Auth::user()->LOGIN_ID)->orderBy('DETAIL_ID', 'DESC')->get();
        } else {
            $project_details = ProjectDetial::orderBy('DETAIL_ID', 'DESC')->get();
        }



        // if (session('success')) {
        //     // Alert::toast('Toast Message', 'Success');
        //     Alert::success('Success!', 'Project Created Successfully');
        // }
        $routeName = $this->getRouteName();
        // $leavedetail= LaveDetailJob::where('detail_job_id',$Lavejob->detail_job_id)->with('Department')->with('LeaveTpye')->first();
        // $tpyeleave = $leavedetail->LeaveTpye->type_lave_name;
        // $department = $leavedetail->Department->department_name;
        // $name = Auth::user()->name;
        // $sMessage = "รายละเอียดการลา\n";
        //         $sMessage .= "ชื่อผู้ลา:"."$name"."\n";
        //         $sMessage .= "แผนก: "."$department"."\n";
        //         $sMessage .= "ประเภทการลา: "."$tpyeleave"."\n";
        //         $sMessage .= "วันที่เริ่มต้นลา:"." $request->sartdate"."\n";
        //         $sMessage .= "วันที่สิ้นสุดการลา:"." $request->enddate"."\n";
        //         $sMessage .= "สถานะ: "."รออนุมัติ"."\n";
        $data['last']  = $this->getLastProject();


        return view('Admin.table', ['project_details' => $project_details, 'data' => $data, 'routename' => $routeName]);
    }

    public function Create()
    {
        $Holydays = Holyday::all()->toJson();

        $Categories = Category::all();

        $projectManagers = User::where("POSITION", 2)->where("IS_ACTIVE", 1)->get();

        $routeName = $this->getRouteName();

        $team = User::all();

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
                $q->orderBy('TASK_ORDER')->orderBy('created_at', 'ASC')->get();
            })->orderBy('created_at', 'ASC')->get();
        })->first();

        // $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();

        // $status = explode(',', $ProjectTrack->TRACKER);

        // dd($project_detail->activity);
        $sum = 0;
        $totalBudget = 0;
        $paidBudget = 0;
        $BudgetActivityNotPaid = 0;
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
        // $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();
        // $status = explode(',', $project_detail->STATUS);
        // $status =  $project_detail->STATUS;

        $Holydays = Holyday::all()->toJson();
        $data['last']  = $this->getLastProject();

        // $tasks = json_encode($tasks);

        $routeName = $this->getRouteName();
        return view('Admin.show', [
            'project_detail' => $project_detail,
            'Holydays' => $Holydays,
            // 'status' => $status,
            'TeamsName' => $project_detail->projectTeam,
            // 'ProjectTrack' => $ProjectTrack,
            'data' => $data,
            // 'tasks' => $tasks,
            // 'project' => $project,
            'routename' => $routeName,
        ]);

        // return view('Admin.show', ['project_detail' => $project_detail, 'status' => $status, 'TeamsName' => $project_detail->projectTeam, 'ProjectTrack' => $ProjectTrack]);

    }

    public function Timeline($id)
    {
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->with('Approver')->with('activity', function ($q) {
            $q->orderBy('ACTIVITY_ID')->with('tasks')->orderBy('created_at', 'ASC')->get();
        })->first();

        // $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->first();

        // $status = $ProjectDetail->STATUS;
        $data['last']  = $this->getLastProject();
        $routeName = $this->getRouteName();
        // ProjectTrack' => $ProjectTrack, 'status' => $status
        return view('Admin.timeline', ['project_detail' => $ProjectDetail, 'data' => $data, 'routename' => $routeName]);
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
        $ProjectDetial->STATUS = 0;
        $ProjectDetial->CATEGORY_ID = $request->category;

        $ProjectDetial->RECORD_CREATOR = Auth::user()->LOGIN_ID;
        $ProjectDetial->PROJECT_MANAGER = $request->projectManager;
        $ProjectDetial->BUDGET = $request->budget;
        $ProjectDetial->TOTAL_DATE = $request->projectDuration;

        // if ($request->projectDurationFormat == "day")
        //     $ProjectDetial->DURATION_TYPE = 0;
        // else if ($request->projectDurationFormat == "week")
        //     $ProjectDetial->DURATION_TYPE = 1;

        // if ($request->isIncludeHolyday == "no")
        //     $ProjectDetial->INC_HOLIDAY = 0;
        // else if ($request->isIncludeHolyday == "yes")
        //     $ProjectDetial->INC_HOLIDAY = 1;

        // if ($request->isIncludeWeekend == "no")
        //     $ProjectDetial->INC_WEEKEND = 0;
        // else if ($request->isIncludeWeekend == "yes")
        //     $ProjectDetial->INC_WEEKEND = 1;

        $this->CheckRadioButton($request, $ProjectDetial);



        //$ProjectDetial->DATE_SAVE = $request->projectDuration;
        $ProjectDetial->save();
        $ProjectDetial = ProjectDetial::where('DETAIL_ID', $detail_id)->first();

        $ProjectDetial->projectTeam()->attach($request->projectTeam);



        // Create Project Tracker Table
        // $ProjectTrack = new ProjectTrack();
        // $trackCounter = ProjectTrack::count();
        // $track_id = "PTR" . sprintf("%04d", ($trackCounter == 0 || $trackCounter == '' ? 1 : $trackCounter + 1));

        // $counterId4 = 1;
        // while (ProjectTrack::where('PROJECT_TRACK_ID', $track_id)->first()) {
        //     $track_id = "PTR" . sprintf("%04d", ($trackCounter == 0 || $trackCounter == '' ? 1 : $trackCounter + ++$counterId4));
        // }
        // $ProjectTrack->PROJECT_TRACK_ID = $track_id;
        // $ProjectTrack->PROJECT_ID = $detail_id;
        // $ProjectTrack->STATUS = 0;
        // $ProjectTrack->timestamps = false;
        // $ProjectTrack->save();



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
        $name = $ProjectDetial->ProjectCreator->NAME;
        $sMessage = "Detail\n";
        $sMessage .= "ID_Project:" . "$detail_id" . "\n";
        $sMessage .= "NameProject: " . " $request->projectName" . "\n";
        $sMessage .= "NameRecord:" . "$name" . "\n";
        $sMessage .= "ProjectStart: " . "$request->projectStart" . "\n";
        $sMessage .= "ProjectEnd:" . " $request->projectEnd" . "\n";
        $sMessage .= "Status: " . "New Release" . "\n";
        // Line::send('' . '' . $sMessage);
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

        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->update(['IS_APPROVE' => 1, 'STATUS' => 1, 'APPROVED_BY' => Auth::user()->LOGIN_ID, 'APPROVED_DATE' => date("y/m/d")]);

        // $ProjectTrack = ProjectTrack::where('PROJECT_ID', $id)->update(['TRACKER' => 'New Release,Approved,workingOn', 'STATUS' => 1, 'APPROVED_BY' => Auth::user()->NAME . "," . date("y/m/d")]);
        $ProjectDetail = ProjectDetial::where('DETAIL_ID', $id)->first();
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
        // Line::send('' . '' . $sMessage);


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


        $this->CheckRadioButton($request, $ProjectDetail);

        $ProjectDetail->save();

        $ProjectDetial = ProjectDetial::where('DETAIL_ID', $ProjectDetail->DETAIL_ID)->first();

        $ProjectDetial->projectTeam()->sync($request->projectTeam);

        return redirect()->back()->with("success", "Project Edited Successfully");
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
        // $project_detail = ProjectDetial::where('DETAIL_ID', $id)->with('tasks', function ($q) {
        //     $q->select(['TASK_ID as id', 'TASK_NAME as name', 'prj_activity_task.START_DATE as start', 'COPLETE_TIME as end', 'prj_activity_task.created_at'])->orderBy('created_at', 'ASC')->get();
        // })->first();
        // $tasks = $project_detail->tasks->toArray();

        #####  Update  #####
        $project_detail2 = ProjectDetial::select(['DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS'])->where('DETAIL_ID', $id)->with('activity', function ($q) {
            $q->select('ACTIVITY_ID', 'ACTIVITY_NAME', 'prj_project_activity.START_DATE', 'END_DATE', 'DETAIL_ID', 'ACTIVITY_ORDER')
                ->with('tasks', function ($q2) {
                    $q2->select('TASK_ID', 'TASK_NAME', 'START_DATE', 'COPLETE_TIME', 'TASK_ORDER', 'ACTIVITY_ID', "STATUS")->whereNotNull('START_DATE')->whereNotNull('COPLETE_TIME')->orderBy('TASK_ORDER')->get();
                })->orderBy('ACTIVITY_ORDER')->get();
        })->first();







        // dd(($project_detail['tasks']));

        $tasks = $project_detail2->tasks->toArray();

        // dd($tasks);

        $project_detail2 = json_encode($project_detail2->toArray());
        $tasks = json_encode($tasks);

        $data['last']  = $this->getLastProject();

        $routeName = $this->getRouteName();
        // return view('testChart.index2', ['tasks' => $tasks, 'project' => $project_detail2, 'data' => $data, 'routename' => $routeName]);
        return view('testChart.index', ['project' => $project_detail2, 'tasks' => $tasks, 'data' => $data, 'routename' => $routeName]);
    }

    public function ConvertTimestampToDateStringFormate($date)
    {
        $newdate = explode(" ", $date);
        return str_replace("-", "/", $newdate[0]);
    }


    public function CheckRadioButton($request, $ProjectDetial)
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
}
