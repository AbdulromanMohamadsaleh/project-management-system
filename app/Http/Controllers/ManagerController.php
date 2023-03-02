<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetial;
use App\Traits\LastProjectTrait;
use Illuminate\Http\Request;
use Phattarachai\LineNotify\Facade\Line;

class ManagerController extends Controller
{
    use LastProjectTrait;
    
    public function index()
    {

        $projects = ProjectDetial::where('IS_APPROVE', 1)->with('Approver')->with('ProjectCreator')->get();
        $data['totalInProggressProjectData'] = $projects->filter(function ($project) {
            return $project->STATUS === 2 || $project->STATUS === 1;
        });

        $data['totalPendingProjectData'] = ProjectDetial::where('IS_APPROVE', 0)->with('ProjectCreator')->get();
        $data['totalInCompleteProjectData'] = ProjectDetial::where('PROJECT_PERCENTAGE', 100)->get();
        $data['totalInCompleteProjectData'] = $data['totalInCompleteProjectData']->map(function ($user) {
            return $user;
        });

        $data['totalPendingProject'] = count($data['totalPendingProjectData']);
        $data['totalInProggressProject'] = count($data['totalInProggressProjectData']);
        $data['totalInCompleteProject'] = count($data['totalInCompleteProjectData']);

        $data['BarChartData'] = ProjectDetial::all()->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->count()->toJson();

        $data['BarChartDataSumBudget'] = ProjectDetial::all()->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->sum('BUDGET')->toJson();

        $data['last']  = $this->getLastProject();
        $data['totalbudget'] = ProjectDetial::where('IS_APPROVE', 1)->sum('BUDGET');

        return view('manager.dashbord', ['data' => $data]);
    }
}
