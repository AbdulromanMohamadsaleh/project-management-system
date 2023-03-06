<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{

    public function index()
    {
        $data['totalUsersData'] = User::all();

        $projects = ProjectDetial::where('IS_APPROVE', 1)->with('Approver')->with('ProjectCreator')->get();
        $data['totalInProggressProjectData'] = $projects->filter(function ($project) {
            return $project->STATUS === 2 || $project->STATUS === 1;
        });

        $data['totalPendingProjectData'] = ProjectDetial::where('IS_APPROVE', 0)->with('ProjectCreator')->get();
        $data['totalInCompleteProjectData'] = ProjectDetial::where('PROJECT_PERCENTAGE', "=", 100)->get();
        $data['totalInCompleteProjectData'] = $data['totalInCompleteProjectData']->map(function ($user) {
            return $user;
        });

        $data['totalUsers'] = count($data['totalUsersData']);
        $data['totalPendingProject'] = count($data['totalPendingProjectData']);
        $data['totalInProggressProject'] = count($data['totalInProggressProjectData']);
        $data['totalInCompleteProject'] = count($data['totalInCompleteProjectData']);

        $data['BarChartData'] = ProjectDetial::all()->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->count()->toJson();
        $data['last']  = ProjectDetial::latest('DETAIL_ID')->limit(5)->get();
        $routeName = $this->getRouteName();

        return view('Admin.index', ['data' => $data, 'routename' => $routeName]);
    }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->Privilege->PRI_NAME == 'Admin') {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }

    public function Approve($id)
    {
        $Login = User::where('LOGIN_ID', $id)->update(['IS_ACTIVE' => 1]);
        return redirect()->back()->with("success", "Active Successfully");
    }

    public function Saveuser(request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:prj_project_login'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:prj_project_login'],
            'password' => ['required', 'string', 'min:8'],
            'agency' => ['required'],
            'position' => ['required'],
        ]);

        $userCounter = User::count();
        $user_id = "USER" . sprintf("%05d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + 1));

        $counterId4 = 1;
        while (User::where('LOGIN_ID', $user_id)->first()) {
            $user_id = "USER" . sprintf("%04d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + ++$counterId4));
        }

        $PROFCounter = Profile::count();
        $PROF_id = "PROF" . sprintf("%05d", ($PROFCounter == 0 || $PROFCounter == '' ? 1 : $PROFCounter + 1));
        $counterIdPROF = 1;
        while (Profile::where('LOGIN_ID', $PROF_id)->first()) {
            $PROF_id = "PROF" . sprintf("%05d", ($PROFCounter == 0 || $PROFCounter == '' ? 1 : $PROFCounter + ++$counterIdPROF));
        }

        $user = new User();
        $user->LOGIN_ID = $user_id;
        $user->EMAIL = $request->email;
        $user->IS_ACTIVE = 0;
        $user->password = Hash::make($request->password);
        $user->PRIV_ID = "04";
        $user->NAME = $request->name;
        $user->save();

        $profile = new Profile();
        $profile->PROF_ID = $PROF_id;
        $profile->LOGIN_ID = $user_id;

        $profile->POS_ID = $request->position;
        $profile->AGENCY = $request->agency;
        $profile->save();


        return redirect()->back()->with("success", "Edit Category Successfully");
    }
}
