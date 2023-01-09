<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
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
}
