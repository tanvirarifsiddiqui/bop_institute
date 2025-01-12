<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Models\Receipt;
use Illuminate\Http\Request;
use PDF;

class ReceiptController extends Controller
{
    public function store(Request $request)
    {
        $formula = Formula::findOrFail($request->formula_id);
        $user = auth()->user();

        // Generate Receipt PDF
        $receiptPdfPath = 'receipts/' . uniqid() . '_receipt.pdf';
        PDF::loadView('pdf.receipt', compact('formula', 'user'))->save(storage_path('app/public/' . $receiptPdfPath));

        // Save Receipt
        $receipt = Receipt::create([
            'user_id' => $user->id,
            'formula_id' => $formula->id,
            'receipt_pdf' => $receiptPdfPath,
        ]);

        return redirect()->route('receipt.show', $receipt->id);
    }

    public function show($id)
    {
        $receipt = Receipt::with('formula', 'user')->findOrFail($id);
        return view('receipts.show', compact('receipt'));
    }
}
