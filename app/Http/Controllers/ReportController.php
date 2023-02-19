<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\LastProjectTrait;

class ReportController extends Controller
{
    use LastProjectTrait;

    public function Show()
    {
        $routeName = $this->getRouteName();
        $data['last']  = $this->getLastProject();
        return view('report.report', ['routename' => $routeName, 'data' => $data]);
    }
}
