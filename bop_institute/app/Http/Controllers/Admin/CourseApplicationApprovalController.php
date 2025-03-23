<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseApplication;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseApplicationStatusNotification;

class CourseApplicationApprovalController extends Controller
{
    /**
     * Display a listing of pending course applications.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $applications = CourseApplication::where('status', 'pending')->with('studentProfile', 'course')->get();
        return view('admin.course_applications.index', compact('applications'));
    }

    /**
     * Approve a course application and transition to "approved" state.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseApplication  $courseApplication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, CourseApplication $courseApplication)
    {
        $courseApplication->update(['status' => 'approved']);

        // Notify the student about the approval
        Notification::send($courseApplication->studentProfile->user, new CourseApplicationStatusNotification('approved'));

        return redirect()->route('admin.course_applications.index')
            ->with('success', 'Course application approved successfully.');
    }

    /**
     * Enroll a student and transition application to "enrolled" state.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseApplication  $courseApplication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enroll(Request $request, CourseApplication $courseApplication)
    {
        // Create an enrollment record
        Enrollment::create([
            'student_profile_id' => $courseApplication->student_profile_id,
            'course_id' => $courseApplication->course_id,
        ]);

        // Update the application status to "enrolled"
        $courseApplication->update(['status' => 'enrolled']);

        // Notify the student about the enrollment
        Notification::send($courseApplication->studentProfile->user, new CourseApplicationStatusNotification('enrolled'));

        return redirect()->route('admin.course_applications.index')
            ->with('success', 'Student enrolled successfully.');
    }

    /**
     * Reject a course application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseApplication  $courseApplication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, CourseApplication $courseApplication)
    {
        $courseApplication->update(['status' => 'rejected']);

        // Notify the student about the rejection
        Notification::send($courseApplication->studentProfile->user, new CourseApplicationStatusNotification('rejected'));

        return redirect()->route('admin.course_applications.index')
            ->with('success', 'Course application rejected.');
    }

}
