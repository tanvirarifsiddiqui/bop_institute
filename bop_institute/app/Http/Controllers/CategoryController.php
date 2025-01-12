<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('categories.index');
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
}
