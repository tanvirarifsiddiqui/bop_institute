<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\StudentProfile;
use App\Notifications\StudentStatusNotification;
use Illuminate\Support\Facades\Notification;

class StudentRegistrationApprovalController extends Controller
{
    /**
     * Display a listing of pending student registrations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $registrations = StudentRegistration::where('status', 'pending')->with('user')->get();
        return view('admin.student_registrations.index', compact('registrations'));
    }

    /**
     * Approve a student registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, StudentRegistration $studentRegistration)
    {
        $studentRegistration->update(['status' => 'approved']);
        StudentProfile::where('user_id', $studentRegistration->user_id)->update(['status' => 'active']);

        // Send notification to the student
        Notification::send($studentRegistration->user, new StudentStatusNotification('approved'));

        return redirect()->route('admin.student_registrations.index')->with('success', 'Student registration approved.');
    }

    /**
     * Reject a student registration with a reason.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, StudentRegistration $studentRegistration)
    {
        $request->validate(['rejection_reason' => 'required|string']);

        $studentRegistration->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);
        StudentProfile::where('user_id', $studentRegistration->user_id)->update(['status' => 'rejected']);

        // Send notification to the student
        Notification::send($studentRegistration->user, new StudentStatusNotification('rejected', $request->rejection_reason));

        return redirect()->route('admin.student_registrations.index')->with('success', 'Student registration rejected.');
    }
}//todo: checking redundency
