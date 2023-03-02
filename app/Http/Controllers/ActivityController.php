<?php

namespace App\Http\Controllers;

use App\Models\Holyday;
use App\Models\ProjectActivity;
use App\Models\ProjectDetial;
use App\Models\ProjectTask;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ActivityController extends Controller
{
    public function EditActivity(Request $request, $id)
    {
        $ProjectActivity = ProjectActivity::where('ACTIVITY_ID', $id)->first();

        $request->validate([
            'activity' => 'required', // after:now
        ]);

        $ProjectActivity->ACTIVITY_NAME = $request->activity;
        $ProjectActivity->timestamps = false;
        $ProjectActivity->update();

        return redirect()->back()->with("success", "Edit Activity Successfully");
    }

    public function DelateActivity($id, $project)
    {
        $ProjectActivity = ProjectActivity::where('ACTIVITY_ID', $id)->first();
        $ProjectActivityForReorder = ProjectActivity::where('DETAIL_ID', $project)->where('ACTIVITY_ORDER', '>', $ProjectActivity->ACTIVITY_ORDER)->orderBy('ACTIVITY_ORDER', 'ASC')->get();

        if ($ProjectActivityForReorder) {
            $i = 0;
            foreach ($ProjectActivityForReorder as $Project) {
                $Project->ACTIVITY_ORDER = $ProjectActivity->ACTIVITY_ORDER + $i++;
                $Project->save();
            }
        }

        $ProjectActivity->delete();

        return redirect()->back()->with("success", "Delete activity Successfully");
    }

    public function Create()
    {
        $Holydays = Holyday::all()->toJson();
        return view('edit_activity_task.add_activity_task', [
            'Holydays' => $Holydays,
        ]);
    }

    public function Save(Request $request, $id)
    {
        $project = ProjectDetial::where('DETAIL_ID', $id)->first();
        if (!$project)
            return redirect()->back();

        $activityName = $request->activityName;
        $taskName = $request->taskName;
        $taskCounter = $request->taskCounter;
        $taskDuration = $request->taskDuration;
        $counterForTask = 0;
        $ActivityCounter = ProjectActivity::count();
        $ActivityId = "ACT" . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $ActivityCounter + 1));

        $counterId2 = 1;
        while (ProjectActivity::where('ACTIVITY_ID', $ActivityId)->first()) {
            $ActivityId = "ACT"  . sprintf("%04d", ($ActivityCounter == 0 || $ActivityCounter == '' ? 1 : $ActivityCounter + ++$counterId2));
        }

        $ProjectActivity = new ProjectActivity(['ACTIVITY_ID' => $ActivityId]);
        $ProjectActivity->ACTIVITY_NAME = $activityName;
        $ProjectActivity->DETAIL_ID = $id;
        $ProjectActivity->DAY_WEEK = $request->projectDurationFormat;
        $ProjectActivity->ACTIVITY_ORDER = $request->activityOrder;
        $ProjectActivity->save();

        for ($j = 0; $j < $taskCounter; $j++) {

            $TaskCounter = ProjectTask::count();
            $tskId = "TASK" . sprintf("%04d", ($TaskCounter == 0 || $TaskCounter == '' ? 1 : $TaskCounter + 1));

            $counterId3 = 1;
            while (ProjectTask::where('TASK_ID', $tskId)->first()) {
                $tskId = "TASK"  . sprintf("%04d", ($TaskCounter == 0 || $TaskCounter == '' ? 1 : $TaskCounter + ++$counterId3));
            }

            $ProjectTask = new ProjectTask(['TASK_ID' => $tskId]);

            $ProjectTask->TASK_NAME = $taskName[$j];
            $ProjectTask->DAY = $taskDuration[$j];
            $ProjectTask->ACTIVITY_ID = $ActivityId;
            $ProjectTask->save();
        }

        return redirect()->back()->with("success", "Activity Added Successfully");
    }

    public function SaveOrder(Request $request)
    {
        $activities = json_decode($request->dd);

        foreach ($activities as $act) {

            $ProjectActivity = ProjectActivity::where('ACTIVITY_ID', $act->taskId)->first();
            $ProjectActivity->ACTIVITY_ORDER = $act->order;
            $ProjectActivity->timestamps = false;
            $ProjectActivity->update();
        }
        return response()->json([
            "success" => "Holyday Added Successfully", 'status' => 'success',
            'response_code' => 200,

        ]);
    }
}
