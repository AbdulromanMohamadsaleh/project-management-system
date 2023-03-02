<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\LastProjectTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use LastProjectTrait;

    public function Index()
    {
        $Category = Category::all();
        $routeName = $this->getRouteName();
        $data['last']  = $this->getLastProject();
        return view('Admin.category', ['Category' => $Category, 'routename' => $routeName, 'data' => $data]);
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

        $validator = $this->getValidator($request);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first());
        }

        $Category = Category::where('CATEGORY_ID', $id)->first();
        $Category->NAME_CATEGORY = $request->input('category_name');
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
