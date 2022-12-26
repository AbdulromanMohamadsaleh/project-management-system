<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $Category = Category::all();
        return view('Admin.category' , ['Category' => $Category]);
    }
    public function Create()
    {
        return view('Admin.createcategory');
    }
    public function Save(request $request)
    {
         $Category = Category::count();

         $Category = "CTY" . sprintf("%04d", ( $Category == 0 ||  $Category == '' ? 1 :  $Category + 1));
         $Category = new Category(['CATEGORY_ID' =>$Category]);
         $Category->NAME_CATEGORY = $request->category_name;
         $Category->timestamps = false;
         $Category->save();
        return redirect()->back();
    }

}
