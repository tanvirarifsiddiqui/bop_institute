<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseApplication;
use App\Notifications\CourseApplicationStatusNotification;
use Illuminate\Support\Facades\Notification;

class CourseApplicationReviewController extends Controller
{
    /**
     * Display a listing of pending course applications.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $applications = CourseApplication::where('status', 'pending')->with('studentProfile.user', 'course')->get();
        return view('admin.course_applications.index', compact('applications'));
    }

    /**
     * Approve a course application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseApplication  $courseApplication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, CourseApplication $courseApplication)
    {
        $courseApplication->update(['status' => 'approved']);

        // Send notification to the student
        Notification::send($courseApplication->studentProfile->user, new CourseApplicationStatusNotification('approved'));

        return redirect()->route('admin.course_applications.index')->with('success', 'Course application approved.');
    }

    /**
     * Reject a course application with a reason.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseApplication  $courseApplication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, CourseApplication $courseApplication)
    {
        $request->validate(['rejection_reason' => 'required|string']);

        $courseApplication->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        // Send notification to the student
        Notification::send($courseApplication->studentProfile->user, new CourseApplicationStatusNotification('rejected', $request->rejection_reason));

        return redirect()->route('admin.course_applications.index')->with('success', 'Course application rejected.');
    }
}//todo:checking redundency
