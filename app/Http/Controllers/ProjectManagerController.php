<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\LastProjectTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ProjectManagerController extends Controller
{
    use LastProjectTrait;
    public function index()
    {
        $data = $this->GetDashboardCardSummary();
        $data['last']  = $this->getLastProject();
        $routeName = $this->getRouteName();

        return view('projectManager.dashbord', ['data' => $data, 'routename' => $routeName]);
    }

    public function GetDashboardCardSummary()
    {
        $user = User::where('LOGIN_ID', Auth::user()->LOGIN_ID)->with('projects', function ($q) {
            $q->where('IS_APPROVE', 1)->get();
        })->first();



        $data['BarChartData'] = $user->projects->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->count()->toJson();

        // Projects the User On it
        $data['userInProjects'] = $user->projects->count();

        $data['userInProjectsData'] = $user->projects;

        // Completed Projects the User On it
        $userInCompletedProjects = $user->projects->filter(function ($project) {
            return $project->STATUS === 3;
        });

        $data['userInCompletedProjects'] = $userInCompletedProjects->count();
        $data['userInCompletedProjectsData'] = $userInCompletedProjects;

        // In Proggress Projects the User On it
        $userInProggressProjects = $user->projects->filter(function ($project) {
            return $project->STATUS === 2 || $project->STATUS === 1;
        });

        $data['userInProggressProjects'] = $userInProggressProjects->count();
        $data['userInProggressData'] = $userInProggressProjects;

        return $data;
    }
}
