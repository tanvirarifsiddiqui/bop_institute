<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseMaterialController extends Controller
{
    /**
     * Display the course materials for an enrolled course.
     *
     * @param  int  $courseId
     * @return \Illuminate\View\View
     */
    public function show($courseId)
    {
        $studentProfile = Auth::user()->studentProfile;
        $enrollment = $studentProfile->enrollments()->with('course.materials')->where('course_id', $courseId)->firstOrFail();

        return view('student.course_materials', compact('enrollment'));
    }
}
