<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HolydayController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProjectManagerController;

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

Route::group(['middleware' => ['auth', 'PreventBackHistory', 'guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::get('/test', function () {
    return view('testChart.index');
});


Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [CustomAuthController::class, 'Logout'])->name('logout');
});

###########################  Admin  ###########################
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/saveuser', [AdminController::class, 'Saveuser'])->name('admin.saveuser');
    Route::delete('/deleteuser/{id}', [UserController::class, 'Delete'])->name('user.delete');
});

Route::post('/activeuser/{id}', [AdminController::class, 'Approve'])->name('activeuser')->middleware('isAdmin');

###########################  Project Manager  ###########################
Route::group(['prefix' => 'ProjectManager', 'middleware' => ['auth', 'isProjectManager', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [ProjectManagerController::class, 'index'])->name('projectManager.dashboard');
});

###########################  Manager  ###########################
Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'isManager', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
});

###########################  Employee  ###########################
Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'isEmployee', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('employee.dashboard');
});


###########################  Dashboard  ###########################
Route::get('/admin', [ProjectController::class, 'Index'])->name('dashboard');


###########################  Project  ###########################
Route::group(
    ['middleware' => ['auth', 'IsActiveUser', 'RemoveSession']],
    function () {

        Route::get('/table', [ProjectController::class, 'Table'])->name('table');
        Route::post('/save', [ProjectController::class, 'Save'])->name('save');
        Route::get('/create', [ProjectController::class, 'Create'])->name('create');
        Route::get('/edit/{ProjectDetial}', [ProjectController::class, 'Edit'])->name('update.project');
        Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
        Route::get('/timeline/{id}', [ProjectController::class, 'Timeline'])->name('timeline');
        // Gantt Tracker
        Route::get('/gantt_Chart/{id}', [ProjectController::class, 'GanttChart'])->name('ganttChart');

        Route::get('/approve', [ProjectController::class, 'Approve'])->name('approve')->middleware('isManager');
        Route::get('/cancel/{id}', [ProjectController::class, 'Cancel'])->name('project.cancel');
        Route::get('/done/{id}', [ProjectController::class, 'Done'])->name('project.aprove');
        Route::get('/dateholyday', [HolydayController::class, 'index'])->name('dateholyday.Index');
        Route::get('/profile', [UserController::class, 'Profile'])->name('profile');
        Route::post('/update/{id}', [ProjectController::class, 'Update'])->name('project.update');
        Route::delete('/delete/{id}', [ProjectController::class, 'Delete'])->name('project.delete');
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

###########################  Report  ###########################

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/report', [ReportController::class, 'Show'])->name('report.report');
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

###########################  Profile  ###########################
Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::post('/editprofile/{id}', [UserController::class, 'Update'])->name('editprofile');
        Route::post('/editPosition/{id}', [UserController::class, 'UpdatePosition'])->name('user.UpdatePosition');
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

###########################  TASK  ###########################
Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/complete-task/{id}', [TaskController::class, 'Complete'])->name('task.done');
        Route::get('/task-timeline/{id}', [TaskController::class, 'Timeline'])->name('task.timeline');
        Route::get('/activity-timeline/{id}', [TaskController::class, 'ActivityTimeline'])->name('activity.timeline');
        Route::get('/sart-task/{id}', [TaskController::class, 'Start'])->name('task.start');
        Route::post('/savebudget-task/{id}', [TaskController::class, 'SaveBudget'])->name('task.savebudget');
        Route::post('/savenote-task/{id}', [TaskController::class, 'SaveNote'])->name('task.savenote');
        Route::post('/edittask/{id}', [TaskController::class, 'EditTask'])->name('task.edit');
        Route::post('/delatetask/{id}', [TaskController::class, 'DelateTask'])->name('task.delete');
        // Ajax
        Route::post('/saveTaskyOrder', [TaskController::class, 'SaveOrder'])->name('task.saveOrder');
        Route::get('/payment/{id}', [TaskController::class, 'Payment'])->name('payment');
    }

);
###########################  activity  ###########################
Route::group(
    ['prefix' => 'projectManager', 'middleware' => ['auth']],
    function () {
        Route::get('/addactivity', [ActivityController::class, 'Create'])->name('activity.add');
        Route::post('/saveAtivity/{id}', [ActivityController::class, 'Save'])->name('activity.save');
        Route::post('/editactivity/{id}', [ActivityController::class, 'EditActivity'])->name('activity.edit');
        Route::post('/delateactivity/{id}/{ProjectDetial}', [ActivityController::class, 'DelateActivity'])->name('activity.delete');
        Route::post('/saveAtivityOrder', [ActivityController::class, 'SaveOrder'])->name('activity.saveOrder');
    }

);



Route::get('/check-project-name/{projectName}', [ProjectController::class, 'ValidateProjectName'])->name('project.ValidateProjectName');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
