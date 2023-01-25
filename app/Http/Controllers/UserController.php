<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Login;
use Flowframe\Trend\Trend;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = $this->GetDashboardCardSummary();


        return view('user.dashbord', ['data' => $data]);
    }

    public function Profile()
    {
        $profile = User::first();
        return view('Admin.profile', ['profile' => $profile]);
    }

    public function Register()
    {
        return view('user.register');
    }

    public function Create()
    {
        $User = User::all();
        return view('Admin.createuser', ['login' => $User]);
    }
    public function Login()
    {
        return view('auth.login');
    }
    public function Save(request $request)
    {
        $userCounter = User::count();
        $user_id = "USER" . sprintf("%05d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + 1));

        $counterId4 = 1;
        while (User::where('LOGIN_ID', $user_id)->first()) {
            $user_id = "USER" . sprintf("%04d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + ++$counterId4));
        }


        $user = new User();
        $user->LOGIN_ID = $user_id;
        $user->NAME = $request->name;
        $user->EMAIL = $request->email;
        $user->POSITION = 'Employee';
        $user->password = Hash::make($request->password);
        // $user->password = $request->password;


        if ($user->save()) {
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
        ]);

        $user = User::where('LOGIN_ID', $id)->first();
        // Getting values from the blade template form
        $user->NAME = $request->name;
        $user->NICKNAME = $request->nickname;
        $user->CARD_ID = $request->Card_Id;
        $user->TELEPHONE = $request->phone;
        // $user->CATEGORY_ID = $id;
        $user->timestamps = false;
        $user->update();
        return redirect()->back();
    }

    public function GetDashboardCardSummary()
    {
        $user = User::where('LOGIN_ID', Auth::user()->LOGIN_ID)->with('projects', function ($q) {
            $q->where('IS_APPROVE', 1)->with('track')->get();
        })->first();


        $data['BarChartData'] = $user->projects->groupBy(function ($item, $key) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('Y');
        })->map->count()->toJson();




        // Projects the User On it
        $data['userInProjects'] = $user->projects->count();

        // Comleted Projects the User On it
        $userInCompletedProjects = $user->projects->filter(function ($project) {
            return $project->track->STATUS === 3;
        });
        $data['userInCompletedProjects'] = $userInCompletedProjects->count();

        // In Proggress Projects the User On it
        $userInProggressProjects = $user->projects->filter(function ($project) {
            return $project->track->STATUS === 2 || $project->track->STATUS === 1;
        });
        $data['userInProggressProjects'] = $userInProggressProjects->count();


        return $data;
    }
}
