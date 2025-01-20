<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Formula;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Formula $formula)
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Pass formula and categories to the view
        return view('admin.formula.edit', compact('formula', 'categories'));
    }

    public function update(Formula $formula, Request $request){
        $data = $request->validate([
            'category_id'=> 'required',
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

           $formula->update($data);
           return redirect(route('admin.formulas.index'))->with('success','Formula Updated Successfully');
    }

    public function destroy(Formula $formula){
        $formula->delete();
        return redirect(route('admin.formulas.index'))->with('success','Formula Deleted Successfully');
    }

    public function viewImage($id)
    {
        $formula = Formula::findOrFail($id);

        // Ensure the image file exists
        if (!Storage::exists('public/' . $formula->image)) {
            abort(404, 'Image not found');
        }

        // Get the file path and display it in the browser
        $filePath = storage_path('app/public/' . $formula->image);

        return response()->file($filePath, [
            'Content-Type' => mime_content_type($filePath)
        ]);
    }

    public function viewPdf($id)
    {
        $formula = Formula::findOrFail($id);

        if (!$formula->pdf) {
            abort(404, 'PDF not found');
        }
        // Serve the PDF securely
        return response()->file(storage_path('app/private/' . $formula->pdf));

    }

    public function topPurchasedFormulas()
    {
        // Fetch top 4 formulas sorted by the 'purchase' column
        $topPurchasedFormulas = Formula::orderBy('purchase', 'desc')->take(4)->get();

        // Pass the formulas to the welcome view
        return view('welcome', compact('topPurchasedFormulas'));
    }

    public function formulaPage(Formula $formula){
        $categories = Category::with('formulas')->get();
        return view('formula.index', compact('categories'));
    }

    public function show($id)
    {
        $formula = Formula::findOrFail($id);

        return view('formula.profile', compact('formula'));
    }


}
