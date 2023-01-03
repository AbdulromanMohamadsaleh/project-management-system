<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
