<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDetial;
use App\Models\ProjectTeam;
use App\Models\Login;

class ProjectController extends Controller
{
    public function Index()
    {
        return view('Admin.index');
    }
    public function Table()
    {
        $project_details = ProjectDetial::orderBy('DETAIL_ID','DESC')->get();
        return view('Admin.table', ['project_details' => $project_details]);
    }
    public function Create()
    {
        $projectManagers = Login::where("POSITION", "project manager")->where("CONFIRM", 1)->get();
        $team = Login::all();
        return view('Admin.create', ['projectManagers' => $projectManagers, 'team' => $team]);
    }
    public function Show($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID',$id)->first();
        $ProjectTeam = ProjectTeam::where('DETAIL_ID',$id);
        $Login = Login::all();
        return view('Admin.show', ['project_detail' => $project_detail],['TeamsName' => $ProjectTeam]);
    }
    public function Approve($id)
    {
        $project_detail = ProjectDetial::where('DETAIL_ID',$id)->first();
        $ProjectTeam = ProjectTeam::where('DETAIL_ID',$id);
        $Login = Login::all();
        return view('Admin.approve', ['project_detail' => $project_detail],['TeamsName' => $ProjectTeam]);
    }
}
