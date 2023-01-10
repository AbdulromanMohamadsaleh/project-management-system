<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return view('Admin.index');
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

        $Login = User::where('LOGIN_ID', $id)->update(['IS_ACTIVE' => 1 ]);

       return redirect()->back();

    }
}
