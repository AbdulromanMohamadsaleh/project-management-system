<?php

namespace App\Traits;

use App\Models\ProjectDetial;
use Illuminate\Http\Request;

trait LastProjectTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function getLastProject(  ) {


        return ProjectDetial::where('IS_APPROVE',1)->with('track')->latest('DETAIL_ID')->limit(5)->get();
    }

}
