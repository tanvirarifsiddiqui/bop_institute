<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    // Display a listing of the inquiries
    public function index()
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    // Display the specified inquiry
    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    // Approve the inquiry
    public function approve(Inquiry $inquiry)
    {
        $inquiry->approved = true;
        $inquiry->save();

        return redirect()->route('admin.inquiries.show', $inquiry->id)
            ->with('success', 'Inquiry approved successfully.');
    }

    // Reply to the inquiry
    public function reply(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $inquiry->reply = $request->reply;
        $inquiry->save();

        // Optionally, send an email notification to the user
        // Mail::to($inquiry->email)->send(new InquiryReplyMail($inquiry));

        return redirect()->route('admin.inquiries.show', $inquiry->id)
            ->with('success', 'Reply saved successfully.');
    }

    // Delete the inquiry
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }
}
