<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:prj_project_login'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:prj_project_login'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $userCounter = Login::count();
        $user_id = "USER" . sprintf("%05d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + 1));

        $counterId4 = 1;
        while (Login::where('LOGIN_ID', $user_id)->first()) {
            $user_id = "USER" . sprintf("%04d", ($userCounter == 0 || $userCounter == '' ? 1 : $userCounter + ++$counterId4));
        }

        return Login::create([
            'LOGIN_ID' => $user_id,
            'NAME' => $data['name'],
            'EMAIL' => $data['email'],
            'PASSWORD' => Hash::make($data['password']),
            'ROLE' => 0,
        ]);
    }
}
