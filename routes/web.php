<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HolydayController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// // Route::get('/login', [CustomLoginController::class, 'login'])->name('login');

###########################  Dashboard  ###########################
Route::get('/admin', [ProjectController::class, 'Index'])->name('dashboard');


###########################  Project  ###########################
Route::get('/table', [ProjectController::class, 'Table'])->name('table');
Route::post('/save', [ProjectController::class, 'Save'])->name('save');
Route::get('/create', [ProjectController::class, 'Create'])->name('create');
Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
Route::get('/timeline/{id}', [ProjectController::class, 'Timeline'])->name('timeline');
Route::get('/approve', [ProjectController::class, 'Approve'])->name('approve');
Route::get('/done/{id}', [ProjectController::class, 'Done'])->name('project.aprove');
Route::delete('/delete{id}', [ProjectController::class, 'Delete'])->name('project.delete');


###########################  Holyday  ###########################
Route::get('/addholyday', [HolydayController::class, 'Create'])->name('addholyday');
Route::post('/holyday/save', [HolydayController::class, 'Save'])->name('holyday.save');
Route::delete('/dateholyday/delete{id}', [HolydayController::class, 'Delete'])->name('holyday.delete');
Route::post('/dateholyday/update{id}', [HolydayController::class, 'Update'])->name('holyday.update');
Route::get('/dateholyday', [HolydayController::class, 'index'])->name('dateholyday.Index');


###########################  Category  ###########################
Route::get('/category', [CategoryController::class, 'Index'])->name('category');
Route::post('/category/save', [CategoryController::class, 'Save'])->name('category.save');
Route::get('/createcategory', [CategoryController::class, 'Create'])->name('createcategory');
Route::delete('/category/delete{id}', [CategoryController::class, 'Delete'])->name('category.delete');
Route::post('/category/update/{id}', [CategoryController::class, 'Update'])->name('category.update');


###########################  Login  ###########################
Route::get('/createuser', [LoginController::class, 'Index'])->name('createuser');
Route::get('login', [LoginController::class, 'Home'])->name('login');


###########################  User  ###########################
Route::get('/profile', [UserController::class, 'Profile'])->name('profile');
Route::get('/register', [UserController::class, 'Register'])->name('register');


###########################  TASK  ###########################
Route::get('/complete-task/{id}', [TaskController::class, 'Complete'])->name('task.done');
