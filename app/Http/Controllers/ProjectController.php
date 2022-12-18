<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\TeamName;
use App\Models\Login;

class ProjectController extends Controller
{
    public function Index()
    {
        return view('Admin.index');
    }
    public function Table()
    {

        $project_details = ProjectDetial::all();



        return view('Admin.table', ['project_details' => $project_details]);
    }
    public function Create()
    {
        return view('Admin.create');
    }
    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID',$id)->first();
        $TeamsName = TeamName::where('DETAIL_ID',$id);
        $Login = Login::all();
        return view('Admin.show', ['project_detail' => $project_detail],['TeamsName' => $TeamsName]);
    }
}
