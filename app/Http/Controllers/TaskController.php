<?php

namespace App\Http\Controllers;

use App\Models\ProjectTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function Complete($id)
    {
        $ProjectDetail = ProjectTask::where('TASK_ID', $id)->update(['STATUS' => 1, 'COPLATE_TIME' => date("Y/m/d")]);
        return redirect()->back();
    }
}
