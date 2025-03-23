<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Display the student dashboard or redirect to the registration form.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = Auth::user();
        $studentProfile = $user->studentProfile;

        if (!$studentProfile) {
            return redirect()->route('student.registration.form')->with('info', 'Please complete your student registration.');
        }

        $enrollments = $studentProfile->enrollments()->with('course')->get();

        return view('student.dashboard', compact('studentProfile', 'enrollments'));
    }
}
