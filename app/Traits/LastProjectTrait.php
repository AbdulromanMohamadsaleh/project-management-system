<?php

namespace App\Traits;

use App\Models\ProjectDetial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait LastProjectTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function getLastProject(  ) {

        if(Auth::user()->POSITION == 'Project Manager'){
            return ProjectDetial::where('IS_APPROVE',1)->where('PROJECT_MANAGER',Auth::user()->LOGIN_ID)->with('track')->latest('DETAIL_ID')->limit(5)->get();

        }else{
            return ProjectDetial::where('IS_APPROVE',1)->with('track')->latest('DETAIL_ID')->limit(5)->get();

        }
    }

}
