<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentStatusController extends Controller
{
    /**
     * Display the payment status.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $studentProfile = Auth::user()->studentProfile;
        $applications = $studentProfile->applications()->with('course')->get();

        return view('student.payment_status', compact('studentProfile', 'applications'));
    }
}
