<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseApplication;
use Illuminate\Support\Facades\Auth;

class CourseApplicationController extends Controller
{
    /**
     * Display the course selection interface.
     *
     * @return \Illuminate\View\View
     */
    public function showCourseSelection()
    {
        $courses = Course::with('program', 'courseable')->get();
        return view('course_application.select_course', compact('courses'));
    }

    /**
     * Handle the course application submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitApplication(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = Auth::user();
        $studentProfile = $user->studentProfile;

        // Create a new course application record in "pending" status.
        CourseApplication::create([
            'student_profile_id' => $studentProfile->id,
            'course_id' => $request->course_id,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('status', 'Course application submitted successfully.');
    }
}
