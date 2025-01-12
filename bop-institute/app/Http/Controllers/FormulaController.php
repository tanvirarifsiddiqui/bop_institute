<?php

namespace App\Http\Controllers;

use App\Models\Formula;

class FormulaController extends Controller
{
    public function index()
    {
        $formulas = Formula::with('category')->get();
        return view('formulas.index', compact('formulas'));
    }

    public function show($id)
    {
        $formula = Formula::findOrFail($id);
        return view('formulas.show', compact('formula'));
    }
}

