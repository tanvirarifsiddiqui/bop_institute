<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseType;
use App\Models\Program;
use App\Models\Course;

class PublicCourseController extends Controller
{
    /**
     * Display the public course catalog.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $courseTypes = CourseType::all();
        $programs = Program::all();
        $courses = Course::with('program', 'courseable')
            ->when($request->course_type, function ($query) use ($request) {
                return $query->whereHas('program', function ($query) use ($request) {
                    return $query->where('course_type_id', $request->course_type);
                });
            })
            ->when($request->program, function ($query) use ($request) {
                return $query->where('program_id', $request->program);
            })
            ->get();

        return view('public.courses.index', compact('courseTypes', 'programs', 'courses'));
    }
}
