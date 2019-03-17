<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCategoryController extends Controller
{
    public function category()
    {
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request)
    {

        $this->validate($request, [
            'category_name' => 'required | regex:/(^([a-zA-Z ]+)?$)/u | max:50',
            'category_description' => 'required'
        ]);

        $existCategory = Category::where('category_name', $request->category_name)->first();

        if($existCategory)
        {
            return redirect()->back()->with('warnMessage', 'This Category Already Exist, Please try Another One Thank You..');
        }
        else
        {
            Category::create($request->all());

            return redirect('/category/add-category')->with('message', 'Data Save Successfully.......');
        }

    }

    public function manageCategory()
    {

        $categories = Category::orderBy('id', 'desc') -> get();

        return view('admin.category.manage-category', [
            'categories'  =>  $categories
        ]);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit-category', [
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);

        $category->category_name           = $request->category_name;
        $category->category_description    = $request->category_description;
        $category->publication_status      = $request->publication_status;
        $category->save();

        return redirect('/category/manage-category')->with('message', 'Data Update Successfully.......');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        $category -> delete();

        return redirect('/category/manage-category')->with('message', 'Data Deleted Successfully.......');
    }

}
