<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Traits\LastProjectTrait;

class ReportController extends Controller
{
    use LastProjectTrait;

    public function Show()
    {
        $routeName = $this->getRouteName();
        $data['last']  = $this->getLastProject();

        $project_detail2 = ProjectDetial::select(['DETAIL_ID', 'NAME_PROJECT', 'BUDGET', 'DATE_START', 'DATE_END', 'STATUS', 'CATEGORY_ID', 'PROJECT_MANAGER', 'RECORD_CREATOR', 'BUDGET', 'created_at'])
            ->with('ProjectManager', function ($q2) {$q2->select('LOGIN_ID', 'NAME')->get();})
            ->with('ProjectCreator' ,function ($q2) {$q2->select('LOGIN_ID', 'NAME')->get();})
            ->with('Category')
            ->get();


            $project_detail2 = (json_encode($project_detail2));
            // dd($project_detail2);

        return view('report.report', ['routename' => $routeName, 'data' => $data, 'project_detail' => $project_detail2]);
    }
}
