<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function  getAdd() {
        $category = Category::get();
        return view('View.Category')->with(['categories'=>$category]);
    }
    public function postAdd(Request $request){
        $this->validate($request,[
           'category_name'=>'required|unique:categories'
        ]);
        $name = $request['category_name'];
        $category = new Category();
        $category->category_name = $name;
        $category->save();
        return redirect()->back()->with('info',"The category have been saved.");
    }
    public function getRemove($category_id) {
        $category = Category::whereId($category_id)->firstOrFail();
        $category->delete();
        return redirect()->back()->with('info',$category->category_name." category have been removed.");
    }
    public function postEdit(Request $request) {
        $name = $request['new_category_name'];
        $id = $request['id'];
        $category = Category::whereId($id)->first();
        $category->category_name = $name;
        $category->update();
        return redirect()->back()->with('info',"The category have been updated.");
    }
}
