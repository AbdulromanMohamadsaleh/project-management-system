<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use App\Models\ProjectTrack;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $data['totalUsersData'] = User::all();

        $projects = ProjectDetial::where('IS_APPROVE', 1)->with('ProjectCreator')->get();

        $data['totalInProggressProjectData'] = $projects->filter(function ($project) {
            return $project->track->STATUS === 2 || $project->track->STATUS === 1;
        });



        $data['totalPendingProjectData'] = ProjectDetial::where('IS_APPROVE', 0)->with('ProjectCreator')->get();
        $data['totalInCompleteProjectData'] = ProjectTrack::where('PROJECT_PERCENTAGE', 100)->with('project')->get();

        $data['totalInCompleteProjectData'] = $data['totalInCompleteProjectData']->map(function ($user) {
            return $user->project;
        });


        $data['totalUsers'] = count($data['totalUsersData']);
        $data['totalPendingProject'] = count($data['totalPendingProjectData']);
        $data['totalInProggressProject'] = count($data['totalInProggressProjectData']);
        $data['totalInCompleteProject'] = count($data['totalInCompleteProjectData']);


        $data['BarChartData'] = ProjectDetial::all()->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->count()->toJson();

        return view('Admin.index', ['data' => $data]);
    }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->POSITION == 'Admin') {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
    public function Approve($id)
    {

        $Login = User::where('LOGIN_ID', $id)->update(['IS_ACTIVE' => 1]);

        return redirect()->back();
    }
    public function Saveuser(request $request)
    {
        $userCounter = User::count();
        $user_id = "USER" . sprintf("%05d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + 1));

        $counterId4 = 1;
        while (User::where('LOGIN_ID', $user_id)->first()) {
            $user_id = "USER" . sprintf("%04d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + ++$counterId4));
        }


        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:prj_project_login'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:prj_project_login'],
            'password' => ['required', 'string', 'min:8'],
            'agency' => ['required'],
            'position' => ['required'],
        ]);



        $user = new User();
        $user->LOGIN_ID = $user_id;
        $user->NAME = $request->name;
        $user->EMAIL = $request->email;
        $user->POSITION = 0;
        $user->password = Hash::make($request->password);
        $user->AGENCY = $request->agency;
        $user->POSITION = $request->position;
        // $user->password = $request->password;
        $user->save();
        return redirect()->back()->with("success", "Edit Category Successfully");
    }
}
