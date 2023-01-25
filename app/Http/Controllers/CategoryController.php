<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $Category = Category::all();
        return view('Admin.category', ['Category' => $Category]);
    }
    public function Create()
    {
        return view('Admin.createcategory');
    }
    public function Save(request $request)
    {
        $Category = Category::count();

        $Category = "CTY" . sprintf("%04d", ($Category == 0 ||  $Category == '' ? 1 :  $Category + 1));
        $Category = new Category(['CATEGORY_ID' => $Category]);

        $Category->NAME_CATEGORY = $request->category_name;
        $Category->timestamps = false;
        $Category->save();
        return redirect()->back();
    }

    public function Delete($id)
    {
        $Category = Category::where('CATEGORY_ID', $id)->delete();
        return redirect()->back();
    }

    public function Update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'category_name' => 'required',
        ]);
        $Category = Category::where('CATEGORY_ID', $id)->first();
        $Category->NAME_CATEGORY = $request->input('category_name');
        // $Category->CATEGORY_ID = $id;
        $Category->timestamps = false;
        $Category->update();
        return redirect()->back();
    }
}
