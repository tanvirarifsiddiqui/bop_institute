<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseType;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courseTypes = CourseType::with('programs.courses')->get();
        return view('courses.index', compact('courseTypes'));
    }
}
