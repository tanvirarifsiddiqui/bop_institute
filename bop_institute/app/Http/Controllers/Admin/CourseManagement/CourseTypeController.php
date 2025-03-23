<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseType;

class CourseTypeController extends Controller
{
    // Display a listing of course types.
    public function index()
    {
        $courseTypes = CourseType::all();
        return view('admin.course_management.course_types.index', compact('courseTypes'));
    }

    // Show the form for creating a new course type.
    public function create()
    {
        return view('admin.course_management.course_types.create');
    }

    // Store a newly created course type in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        CourseType::create($request->only('name'));

        return redirect()->route('admin.course_management.course_types.index')
            ->with('success', 'Course Type created successfully.');
    }

    // Show the form for editing the specified course type.
    public function edit(CourseType $courseType)
    {
        return view('admin.course_management.course_types.edit', compact('courseType'));
    }

    // Update the specified course type in storage.
    public function update(Request $request, CourseType $courseType)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $courseType->update($request->only('name'));

        return redirect()->route('admin.course_management.course_types.index')
            ->with('success', 'Course Type updated successfully.');
    }

    // Remove the specified course type from storage.
    public function destroy(CourseType $courseType)
    {
        $courseType->delete();
        return redirect()->route('admin.course_management.course_types.index')
            ->with('success', 'Course Type deleted successfully.');
    }
}
