<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use App\Models\ProjectTrack;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $data['totalUsers'] = User::all()->count();

        $data['totalPendingProject'] = ProjectDetial::where('IS_APPROVE', 0)->count();
        $data['totalInProggressProject'] = ProjectDetial::where('IS_APPROVE', 1)->count();

        $data['totalInCompleteProject'] = ProjectTrack::where('PROJECT_PERCENTAGE', 100)->count();

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
}
