<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseSession;

class CourseSessionController extends Controller
{
    // List all sessions
    public function index()
    {
        $sessions = CourseSession::all();
        return view('admin.course_management.sessions.index', compact('sessions'));
    }

    // Show the form to create a new session
    public function create()
    {
        return view('admin.course_management.sessions.create');
    }

    // Store a new session
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        CourseSession::create($request->only('name'));
        return redirect()->route('admin.course_management.sessions.index')
            ->with('success', 'Course session created successfully.');
    }

    // Show the form for editing a session
    public function edit(CourseSession $session)
    {
        return view('admin.course_management.sessions.edit', compact('session'));
    }

    // Update an existing session
    public function update(Request $request, CourseSession $session)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $session->update($request->only('name'));
        return redirect()->route('admin.course_management.sessions.index')
            ->with('success', 'Course session updated successfully.');
    }

    // Delete a session
    public function destroy(CourseSession $session)
    {
        $session->delete();
        return redirect()->route('admin.course_management.sessions.index')
            ->with('success', 'Course session deleted successfully.');
    }
}
