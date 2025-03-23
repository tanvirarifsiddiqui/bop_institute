<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Program;
use App\Models\CourseSession;
use App\Models\Batch;

class CourseController extends Controller
{
    // Display a list of courses
    public function index()
    {
        $courses = Course::with('program')->get();
        return view('admin.course_management.courses.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create()
    {
        $programs = Program::all();
        $sessions = CourseSession::all();
        $batches = Batch::all();
        return view('admin.course_management.courses.create', compact('programs', 'sessions', 'batches'));
    }

    // Store a new course
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|unique:courses,course_code',
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'course_fee' => 'required|numeric',
            'duration' => 'required|string|max:50',
            'mode' => 'required|in:online,offline',
            'apply_option' => 'sometimes|boolean',
            // For polymorphic relation: either session_id or batch_id must be provided
            'courseable_type' => 'required|in:session,batch',
            'courseable_id' => 'required|numeric'
        ]);

        // Determine the actual polymorphic type
        $courseableType = $request->courseable_type === 'session' ? \App\Models\CourseSession::class : \App\Models\Batch::class;

        Course::create([
            'course_code' => $request->course_code,
            'program_id' => $request->program_id,
            'name' => $request->name,
            'course_fee' => $request->course_fee,
            'duration' => $request->duration,
            'mode' => $request->mode,
            'apply_option' => $request->has('apply_option'),
            'courseable_type' => $courseableType,
            'courseable_id' => $request->courseable_id,
        ]);

        return redirect()->route('admin.course_management.courses.index')
            ->with('success', 'Course created successfully.');
    }

    // Show the form for editing a course
    public function edit(Course $course)
    {
        $programs = Program::all();
        $sessions = CourseSession::all();
        $batches = Batch::all();
        return view('admin.course_management.courses.edit', compact('course', 'programs', 'sessions', 'batches'));
    }

    // Update an existing course
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_code' => 'required|unique:courses,course_code,'.$course->id,
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'course_fee' => 'required|numeric',
            'duration' => 'required|string|max:50',
            'mode' => 'required|in:online,offline',
            'apply_option' => 'sometimes|boolean',
            'courseable_type' => 'required|in:session,batch',
            'courseable_id' => 'required|numeric'
        ]);

        $courseableType = $request->courseable_type === 'session' ? \App\Models\CourseSession::class : \App\Models\Batch::class;

        $course->update([
            'course_code' => $request->course_code,
            'program_id' => $request->program_id,
            'name' => $request->name,
            'course_fee' => $request->course_fee,
            'duration' => $request->duration,
            'mode' => $request->mode,
            'apply_option' => $request->has('apply_option'),
            'courseable_type' => $courseableType,
            'courseable_id' => $request->courseable_id,
        ]);

        return redirect()->route('admin.course_management.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course_management.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
