<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Traits\LastProjectTrait;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    use LastProjectTrait;

    public function Show()
    {
        $routeName = $this->getRouteName();
        $data['last']  = $this->getLastProject();

        // $project_detail2 = ProjectDetial::select(['DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS', 'CATEGORY_ID', 'PROJECT_MANAGER', 'RECORD_CREATOR', 'BUDGET', 'created_at'])
        //     ->with('ProjectManager', function ($q2) {$q2->select('LOGIN_ID', 'NAME')->get();})
        //     ->with('ProjectCreator' ,function ($q2) {$q2->select('LOGIN_ID', 'NAME')->get();})
        //     ->with('Category')
        //     ->get();



        $project_detail2 = $this->GetProjects();

        $project_detail2 = (json_encode($project_detail2));

        return view('report.report2', ['routename' => $routeName, 'data' => $data, 'project_detail' => $project_detail2]);
    }


    public function GetProjects()
    {
        if (Auth::user()->POSITION == 'Employee') {
            $user = User::where('LOGIN_ID', Auth::user()->LOGIN_ID)->with('projects', function ($q) {
                $q->select(['prj_detail.DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS', 'CATEGORY_ID', 'PROJECT_MANAGER', 'RECORD_CREATOR', 'BUDGET', 'created_at'])
                    ->with('ProjectManager', function ($q2) {
                        $q2->select('LOGIN_ID', 'NAME')->get();
                    })
                    ->with('ProjectCreator', function ($q2) {
                        $q2->select('LOGIN_ID', 'NAME')->get();
                    })
                    ->with('Category')
                    ->get();
            })->first();

            $project_detail2 = $user->projects;
        } else if (Auth::user()->POSITION == 'Project Manager') {

            $project_detail2 = ProjectDetial::where('PROJECT_MANAGER', Auth::user()->LOGIN_ID)->select(['DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS', 'CATEGORY_ID', 'PROJECT_MANAGER', 'RECORD_CREATOR', 'BUDGET', 'created_at'])
                ->with('ProjectManager', function ($q2) {
                    $q2->select('LOGIN_ID', 'NAME')->get();
                })
                ->with('ProjectCreator', function ($q2) {
                    $q2->select('LOGIN_ID', 'NAME')->get();
                })
                ->with('Category')
                ->get();
        } else {
            $project_detail2 = ProjectDetial::select(['DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS', 'CATEGORY_ID', 'PROJECT_MANAGER', 'RECORD_CREATOR', 'BUDGET', 'created_at'])
                ->with('ProjectManager', function ($q2) {
                    $q2->select('LOGIN_ID', 'NAME')->get();
                })
                ->with('ProjectCreator', function ($q2) {
                    $q2->select('LOGIN_ID', 'NAME')->get();
                })
                ->with('Category')
                ->get();
        }

        return $project_detail2;
    }
}
