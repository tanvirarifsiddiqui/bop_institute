<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index',['categories'=>$categories]);
    }
    
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required',
        ]);

        $newCategory = Category::create($data);

        return redirect(route('categories.index'));

        // dd($request);

    }

    public function edit(Category $category){
        return view('categories.edit', ['category'=>$category]);
    }

    public function update(Category $category, Request $request){
        $data = $request->validate([
            'name'=>'required',
        ]);

        $category->update($data);

        return redirect(route('categories.index'))->with('success', 'Category Updated Successfully');

    }

    public function destroy(Category $category){
        $category->delete();

        return redirect(route('categories.index'))->with('success', 'Category Deleted Successfully');
    }
}
