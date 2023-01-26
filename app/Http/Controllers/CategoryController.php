<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $Category = new Category();
        $CategoryCounter = Category::count();


        $CATEGORY_ID = "CTY" . sprintf("%04d", ($CategoryCounter == 0 || $CategoryCounter == '' ? 1 : $CategoryCounter + 1));

        $CategoryCounterId = 1;
        while (Category::where('CATEGORY_ID', $CATEGORY_ID)->first()) {
            $CATEGORY_ID = "CTY" . sprintf("%04d", ($CategoryCounter == 0 || $CategoryCounter == '' ? 1 : $CategoryCounter + ++$CategoryCounterId));
        }

        $Category->CATEGORY_ID = $CATEGORY_ID;

        $Category->NAME_CATEGORY = $request->category_name;
        $Category->timestamps = false;
        $Category->save();
        return redirect()->back()->with("success", "Add Category Successfully");
    }

    public function Delete($id)
    {
        $Category = Category::where('CATEGORY_ID', $id)->delete();
        return redirect()->back()->with("success", "Delete Category Successfully");
    }

    public function Update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        // $request->validate([
        //     'category_name' => 'required|unique:prj_category,NAME_CATEGORY',
        // ]);

        $validator = $this->getValidator($request);

        if ($validator->fails()) {
            dd($validator->errors()->first());
            // return redirect()->back()->with("error", $validator->errors()->first());
            return $this->errorResponse($validator->errors()->first());
        }

        $Category = Category::where('CATEGORY_ID', $id)->first();
        $Category->NAME_CATEGORY = $request->input('category_name');
        // $Category->CATEGORY_ID = $id;
        $Category->timestamps = false;
        $Category->update();
        return redirect()->back()->with("success", "Edit Category Successfully");
    }

    protected function getValidator(Request $request)
    {
        $rules = [
            'category_name' => 'required|unique:prj_category,NAME_CATEGORY',
        ];

        return dd(Validator::make($request->all(), $rules));
    }
}
