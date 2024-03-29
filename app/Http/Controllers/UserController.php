<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Privilege;
use Flowframe\Trend\Trend;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Traits\LastProjectTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    use LastProjectTrait;

    public function index()
    {
        $data = $this->GetDashboardCardSummary();
        $data['last']  = $this->getLastProject();
        $routeName = $this->getRouteName();
        return view('user.dashbord', ['data' => $data, 'routename' => $routeName]);
    }

    public function Profile()
    {
        $profile = User::first();
        $data['last']  = $this->getLastProject();
        $routeName = $this->getRouteName();
        return view('Admin.profile', ['profile' => $profile, 'data' => $data, 'routename' => $routeName]);
    }

    public function Register()
    {
        return view('user.register');
    }

    public function Create()
    {
        $User = User::with(['Profile' => function ($q) {
            $q->with("Position")->get();
        }])->with("Privilege")->get();

        $data['last']  = $this->getLastProject();
        $routeName = $this->getRouteName();

        $Position = Position::all();
        $privilege = Privilege::all();

        return view('Admin.createuser', ['login' => $User, 'positions' => $Position, 'privileges' => $privilege, 'data' => $data, 'routename' => $routeName]);
    }

    public function Login()
    {
        return view('auth.login');
    }

    public function Save(request $request)
    {
        // User
        $userCounter = User::count();
        $user_id = "USER" . sprintf("%05d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + 1));
        $counterId4 = 1;
        while (User::where('LOGIN_ID', $user_id)->first()) {
            $user_id = "USER" . sprintf("%05d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + ++$counterId4));
        }

        // Profile
        $PROFCounter = Profile::count();
        $PROF_id = "PROF" . sprintf("%05d", ($PROFCounter == 0 || $PROFCounter == '' ? 1 : $PROFCounter + 1));
        $counterIdPROF = 1;
        while (Profile::where('LOGIN_ID', $PROF_id)->first()) {
            $PROF_id = "PROF" . sprintf("%05d", ($PROFCounter == 0 || $PROFCounter == '' ? 1 : $PROFCounter + ++$counterIdPROF));
        }

        $user = new User();
        $user->LOGIN_ID = $user_id;
        $user->EMAIL = $request->email;
        $user->POSITION = 0;
        $user->PRIV_ID  = "04";
        $user->STATUS = 0;
        $user->NAME = $request->name;
        $user->password = Hash::make($request->password);

        if ($user->save()) {

            $profile = new Profile();
            $profile->PROF_ID = $PROF_id;
            $profile->LOGIN_ID = $user_id;
            $profile->POS_ID = "02";
            $profile->save();

            return redirect()->back();
        }
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'Card_Id' => 'required',
            'phone' => 'required',
            'img' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        $profile = Profile::where('LOGIN_ID', $id)->first();

        $user = User::where('LOGIN_ID', $id)->first();

        // Getting values from the blade template form
        $user->NAME = $request->name;
        $profile->NICKNAME = $request->nickname;
        $profile->CARD_ID = $request->Card_Id;
        $profile->TELEPHONE = $request->phone;
        $profile->DEPARTMENT = $request->Department;

        if ($request->img) {
            $imageName = time() . '.' . $request->img->extension();
            $file_path = app_path() . '/images' . $profile->IMG;
            $request->img->move(public_path('images'), $imageName);
            $profile->IMG = $imageName;
        }

        $profile->timestamps = false;
        $user->update();
        $profile->update();
        return redirect()->back()->with("success", "Update Successfully");
    }

    public function UpdatePosition(Request $request, $id)
    {
        if (Auth::user()->Privilege->PRI_NAME != 'Admin')
            return redirect()->back()->with("error", "Dont Have Access");

        $user = User::where('LOGIN_ID', $id)->with("Profile")->first();
        // Getting values from the blade template form
        $user->Profile->POS_ID = $request->position;
        $user->PRIV_ID = $request->privilege;
        $user->STATUS = $request->status;
        $user->Profile->save();
        $user->timestamps = false;
        $user->update();
        return redirect()->back()->with("success", "Update Successfully");
    }

    public function GetDashboardCardSummary()
    {
        $user = User::where('LOGIN_ID', Auth::user()->LOGIN_ID)->with('projects', function ($q) {
            $q->where('IS_APPROVE', 1)->with('Approver')->get();
        })->first();

        $data['BarChartData'] = $user->projects->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->count()->toJson();

        // Projects the User On it
        $data['userInProjects'] = $user->projects->count();
        $data['userInProjectsData'] = $user->projects;

        // Comleted Projects the User On it
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

    public function Delete($id)
    {
        User::where('LOGIN_ID', $id)->delete();

        return redirect()->back()->with("success", "User Deleted Successfully");
    }
}
