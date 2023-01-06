<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\HolydayController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [CustomAuthController::class, 'Logout'])->name('logout');
});

###########################  Admin  ###########################
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});

###########################  User  ###########################
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isProjectManager', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
});

###########################  Dashboard  ###########################
Route::get('/admin', [ProjectController::class, 'Index'])->name('dashboard');


###########################  Project  ###########################
Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::get('/table', [ProjectController::class, 'Table'])->name('table');
        Route::post('/save', [ProjectController::class, 'Save'])->name('save');
        Route::get('/create', [ProjectController::class, 'Create'])->name('create');
        Route::get('/update/{ProjectDetial}', [ProjectController::class, 'Update'])->name('update.project');
        Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
        Route::get('/timeline/{id}', [ProjectController::class, 'Timeline'])->name('timeline');
        Route::get('/approve', [ProjectController::class, 'Approve'])->name('approve');
        Route::get('/done/{id}', [ProjectController::class, 'Done'])->name('project.aprove');
        Route::get('/dateholyday', [HolydayController::class, 'index'])->name('dateholyday.Index');
        Route::get('/profile', [UserController::class, 'Profile'])->name('profile');

        Route::delete('/delete{id}', [ProjectController::class, 'Delete'])->name('project.delete');
    }
);
###########################  Holyday  ###########################
Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/addholyday', [HolydayController::class, 'Create'])->name('addholyday');
        Route::post('/holyday/save', [HolydayController::class, 'Save'])->name('holyday.save');
        Route::delete('/dateholyday/delete{id}', [HolydayController::class, 'Delete'])->name('holyday.delete');
        Route::post('/dateholyday/update{id}', [HolydayController::class, 'Update'])->name('holyday.update');
        Route::get('/dateholyday', [HolydayController::class, 'index'])->name('dateholyday.Index');
    }
);

###########################  Category  ###########################
Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/category', [CategoryController::class, 'Index'])->name('category');
        Route::post('/category/save', [CategoryController::class, 'Save'])->name('category.save');
        Route::get('/createcategory', [CategoryController::class, 'Create'])->name('createcategory');
        Route::delete('/category/delete{id}', [CategoryController::class, 'Delete'])->name('category.delete');
        Route::post('/category/update/{id}', [CategoryController::class, 'Update'])->name('category.update');
    }
);


###########################  Login  ###########################
Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/createuser', [UserController::class, 'Create'])->name('createuser');
    }
);

###########################  User  ###########################
// Route::get('/profile', [UserController::class, 'Profile'])->name('profile');
// Route::get('/register', [UserController::class, 'Register'])->name('register');


###########################  TASK  ###########################
Route::get('/complete-task/{id}', [TaskController::class, 'Complete'])->name('task.done');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
