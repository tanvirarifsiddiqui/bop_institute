<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Formula;

class FormulaController extends Controller
{
    public function index(){
        $formulas = Formula::all();
        return view('admin.formula.index', ['formulas'=>$formulas]);

    }

    public function create(){
        return view('admin.formula.create');
    }

    public function store(Request $request){
       $data = $request->validate([
        'category_id'=> 'required',
        'title'=> 'required',
        'price'=> 'required | numeric',
        'description'=> 'required',
        'discount'=> 'required | numeric',
       ]);

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
