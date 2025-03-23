<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends Controller
{
    // List all batches
    public function index()
    {
        $batches = Batch::all();
        return view('admin.course_management.batches.index', compact('batches'));
    }

    // Show the form to create a new batch
    public function create()
    {
        return view('admin.course_management.batches.create');
    }

    // Store a new batch
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'start_date' => 'required|date'
        ]);
        Batch::create($request->only('name', 'start_date'));
        return redirect()->route('admin.course_management.batches.index')
            ->with('success', 'Batch created successfully.');
    }

    // Show the form for editing a batch
    public function edit(Batch $batch)
    {
        return view('admin.course_management.batches.edit', compact('batch'));
    }

    // Update an existing batch
    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'start_date' => 'required|date'
        ]);
        $batch->update($request->only('name', 'start_date'));
        return redirect()->route('admin.course_management.batches.index')
            ->with('success', 'Batch updated successfully.');
    }

    // Delete a batch
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('admin.course_management.batches.index')
            ->with('success', 'Batch deleted successfully.');
    }
}
