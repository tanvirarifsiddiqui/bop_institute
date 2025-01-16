<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Formula;

class FormulaController extends Controller
{
    public function index(){
        $formulas = Formula::all();
        return view('admin.formula.index', ['formulas'=>$formulas]);

    }

    public function create(){
        $categories = Category::all();
        return view('admin.formula.create',["categories"=>$categories]);
    }

    public function store(Request $request){
       $data = $request->validate([
        'category_id'=> 'required|exists:categories,id',
        'title'=> 'required',
        'price'=> 'required | numeric',
        'description'=> 'required',
        'discount'=> 'required | numeric',
        'pdf' => 'nullable|mimes:pdf|max:2048',
        'image' => 'nullable|image|max:2048',
       ]);

        // Handle PDF Upload
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('pdfs', 'private');
        }

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

       $newFormula = Formula::create($data);

       return redirect(route('admin.formulas.index'));
    }

    public function edit(Formula $formula){
        return view('admin.formula.edit',['formula'=>$formula]);
    }

    public function update(Formula $formula, Request $request){
        $data = $request->validate([
            'category_id'=> 'required',
            'title'=> 'required',
            'price'=> 'required | numeric',
            'description'=> 'required',
            'discount'=> 'required | numeric',
           ]);

           $formula->update($data);
           return redirect(route('admin.formulas.index'))->with('success','Formula Updated Successfully');
    }

    public function destroy(Formula $formula){
        $formula->delete();
        return redirect(route('admin.formulas.index'))->with('success','Formula Deleted Successfully');
    }

}
