<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Show bKash Payment Page
    public function showBkashPaymentPage(Request $request)
    {
        $formulaId = $request->input('formula_id');
        $formula = Formula::findOrFail($formulaId);

        return view('payment.bkash', compact('formula'));
    }

    // Process bKash Payment
    public function processBkashPayment(Request $request)
    {
        $request->validate([
            'formula_id' => 'required|exists:formulas,id',
            'transaction_id' => 'required|string',
        ]);

        $formula = Formula::findOrFail($request->input('formula_id'));
        $transactionId = $request->input('transaction_id');

        // Store payment information in the database (or handle logic)
        // Example: You could store this in a `payments` table
        // Payment::create([
        //     'user_id' => auth()->id(),
        //     'formula_id' => $formula->id,
        //     'transaction_id' => $transactionId,
        //     'status' => 'completed',
        // ]);

        // Redirect back to the formula profile or a success page
        return redirect()->route('formula.profile', $formula->id)
            ->with('success', 'Payment successful. Your formula book is now available in your account.');
    }

}
