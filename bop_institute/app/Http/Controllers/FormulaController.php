<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Formula;

class FormulaController extends Controller
{
    public function index(){
        return view('formulas.index');
    }
    
    public function create(){
        return view('formulas.create');
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

       return redirect(route('formulas.index'));
    }

}
