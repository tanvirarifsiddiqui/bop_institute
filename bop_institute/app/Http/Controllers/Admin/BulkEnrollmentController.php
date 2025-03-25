<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseApplication;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseApplicationStatusNotification;

class BulkEnrollmentController extends Controller
{
    /**
     * Display the bulk enrollment processing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $approvedApplications = CourseApplication::where('status', 'approved')->with('studentProfile.user', 'course')->get();
        $courses = Course::with(['enrollments.studentProfile.user'])->get();
        return view('admin.bulk_enrollment.index', compact('approvedApplications', 'courses'));
    }

    /**
     * Process bulk enrollments.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processBulkEnrollments(Request $request)
    {
        $applicationIds = $request->input('application_ids', []);

        DB::transaction(function () use ($applicationIds) {
            foreach ($applicationIds as $applicationId) {
                $application = CourseApplication::find($applicationId);
                if ($application && $application->status === 'approved') {
                    Enrollment::create([
                        'student_profile_id' => $application->student_profile_id,
                        'course_id' => $application->course_id,
                    ]);
                    $application->update(['status' => 'enrolled']);
                    Notification::send($application->studentProfile->user, new CourseApplicationStatusNotification('enrolled'));
                }
            }
        });

        return redirect()->route('admin.bulk_enrollment.index')->with('success', 'Bulk enrollments processed successfully.');
    }
}
