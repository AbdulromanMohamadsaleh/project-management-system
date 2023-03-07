<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->POSITION == 'Admin') {

            return route('admin.dashboard');
        } elseif (Auth()->user() == 'Employee') {
            return route('employee.dashboard');
        } elseif (Auth()->user() == 'Manager') {
            return route('manager.dashboard');
        } elseif (Auth()->user() == 'Project Manager') {
            return route('projectManager.dashboard');
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('EMAIL' => $input['email'], 'password' => $input['password']))) {

            if (Auth::user()->STATUS == 1) {
                if (auth()->user()->POSITION == 'Admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (auth()->user()->POSITION == 'Project Manager') {
                    return redirect()->route('projectManager.dashboard');
                } elseif (auth()->user()->POSITION == 'Manager') {
                    return redirect()->route('manager.dashboard');
                } elseif (auth()->user()->POSITION == 'Employee') {
                    return redirect()->route('employee.dashboard');
                }
            } else {
                Session::flush();

                Auth::logout();
                return redirect()->route('login')->with('errorNotActive', 'User Not Active');
            }
        } else {
            Session::flash('errorMassage', "Email or password are wrong");
            return redirect()->route('login');
        }
    }
}
