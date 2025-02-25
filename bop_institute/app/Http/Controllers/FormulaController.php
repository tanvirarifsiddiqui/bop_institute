<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Payment;
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
            $data['pdf'] = $request->file('pdf')->store('pdfs', 'public');
        }

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

       $newFormula = Formula::create($data);

       return redirect(route('admin.formulas.index'))->with('success', 'Formula Created Successfully');
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
            $data['pdf'] = $request->file('pdf')->store('pdfs', 'public');
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
        $topPurchasedFormulas = Formula::orderBy('purchase', 'desc')->take(6)->get();

        // Pass the formulas to the welcome view
        return view('welcome', compact('topPurchasedFormulas'));
    }

    public function formulaPage(Formula $formula){
        $categories = Category::with('formulas')->get();
        return view('formula.index', compact('categories'));
    }
    public function showSidebar()
    {
        // Fetch categories with their formulas
        $categories = Category::with('formulas')->get();

        return view('sidebar', compact('categories'));
    }

    public function show($id)
    {
        $formula = Formula::findOrFail($id);

        return view('formula.profile', compact('formula'));
    }
    public function landingPage($id)
    {
        $formula = Formula::findOrFail($id);
        $categories = Category::all();
        $relatedFormulas = Formula::where('category_id', $formula->category_id)
            ->where('id', '<>', $formula->id)
            ->take(5)
            ->get();

        // Fetch approved inquiries for FAQ
        $faqs = Inquiry::where('formula_id', $id)
            ->where('approved', true)
            ->get();

        return view('formula.landingPage.landing', compact('formula', 'categories', 'relatedFormulas', 'faqs'));
    }


    public function submitInquiry(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'industry' => 'required|exists:categories,id',
            'message'  => 'required|string',
        ]);

        Inquiry::create([
            'formula_id'  => $id,
            'name'        => $request->name,
            'email'       => $request->email,
            'category_id' => $request->industry,
            'message'     => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your inquiry has been submitted and is pending approval.');
    }

    public function purchasePage($id)
    {
        $formula = Formula::findOrFail($id);
        return view('formula.purchase', compact('formula'));
    }

    public function processPurchase(Request $request, $id)
    {
        $formula = Formula::findOrFail($id);

        // Process purchase logic here (e.g., payment gateway integration)
        return redirect()->route('payment.bkash', ['formula_id' => $formula->id]);
    }

    public function downloadPDF($paymentId)
    {
        // Find the payment record by paymentId
        $payment = Payment::where('payment_id', $paymentId)->first();

        if (!$payment) {
            return redirect()->back()->with('error', 'Payment record not found.');
        }

        // Get the formula associated with the payment
        $formula = Formula::find($payment->formula_id);

        if (!$formula) {
            return redirect()->back()->with('error', 'Formula not found.');
        }

        // Get the PDF path
        $pdfPath = $formula->pdf;

        // Ensure the file exists in storage
        if (!Storage::exists("private/{$pdfPath}")) {
            return redirect()->back()->with('error', 'PDF file not found.');
        }

        // Serve the PDF for download
        return Storage::download("private/{$pdfPath}");
    }


}
