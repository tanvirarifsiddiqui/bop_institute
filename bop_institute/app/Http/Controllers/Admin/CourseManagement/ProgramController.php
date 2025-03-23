<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\CourseType;

class ProgramController extends Controller
{
    // Display a list of programs
    public function index()
    {
        $programs = Program::with('courseType')->get();
        return view('admin.course_management.programs.index', compact('programs'));
    }

    // Show the form for creating a new program
    public function create()
    {
        $courseTypes = CourseType::all();
        return view('admin.course_management.programs.create', compact('courseTypes'));
    }

    // Store a new program
    public function store(Request $request)
    {
        $request->validate([
            'course_type_id' => 'required|exists:course_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Program::create($request->only(['course_type_id', 'name', 'description']));

        return redirect()->route('admin.course_management.programs.index')
            ->with('success', 'Program created successfully.');
    }

    // Show the form for editing an existing program
    public function edit(Program $program)
    {
        $courseTypes = CourseType::all();
        return view('admin.course_management.programs.edit', compact('program', 'courseTypes'));
    }

    // Update an existing program
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'course_type_id' => 'required|exists:course_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $program->update($request->only(['course_type_id', 'name', 'description']));

        return redirect()->route('admin.course_management.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    // Delete a program
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.course_management.programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}
