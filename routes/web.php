<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [CustomLoginController::class, 'login'])->name('login');

Route::get('/admin', [ProjectController::class, 'Index'])->name('dashboard');
Route::get('/table', [ProjectController::class, 'Table'])->name('table');
Route::post('/save', [ProjectController::class, 'Save'])->name('save');
Route::get('/create', [ProjectController::class, 'Create'])->name('create');
Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
Route::get('/timeline', [ProjectController::class, 'Timeline'])->name('timeline');
Route::get('/approve', [ProjectController::class, 'Approve'])->name('approve');
Route::get('/done/{id}', [ProjectController::class, 'Done'])->name('done');
