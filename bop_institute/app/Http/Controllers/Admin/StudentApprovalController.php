<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\StudentProfile;
use App\Models\User;
use App\Notifications\StudentStatusNotification;
use Illuminate\Support\Facades\Notification;

class StudentApprovalController extends Controller
{
    /**
     * Display a listing of pending student registrations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pendingRegistrations = StudentRegistration::where('status', 'pending')
            ->with(['studentProfile', 'user'])
            ->get();

        $approvedRegistrations = StudentRegistration::where('status', 'approved')
            ->with(['studentProfile', 'user'])
            ->get();

        return view('admin.student_registrations.index', compact('pendingRegistrations', 'approvedRegistrations'));
    }

    /**
     * Display the specified registration details.
     *
     * @param  StudentRegistration  $studentRegistration
     * @return \Illuminate\View\View
     */
    public function show(StudentRegistration $studentRegistration)
    {
        return view('admin.student_registrations.show', compact('studentRegistration'));
    }

    /**
     * Approve a pending student registration.
     *
     * @param  Request  $request
     * @param  StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\RedirectResponse
     */

    public function approve(Request $request, StudentRegistration $studentRegistration)
    {
        // Update registration and associated profile status.
        $studentRegistration->update(['status' => 'approved']);
        StudentProfile::where('user_id', $studentRegistration->user_id)
            ->update(['status' => 'active']);

        // Send notification to student.
        $user = $studentRegistration->user;
        Notification::send($user, new StudentStatusNotification('approved'));

        return redirect()->route('admin.student_registrations.index')
            ->with('success', 'Student registration approved successfully.');
    }

    /**
     * Reject a pending student registration.
     *
     * @param  Request  $request
     * @param  StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, StudentRegistration $studentRegistration)
    {
        // Update registration status to rejected.
        $studentRegistration->update(['status' => 'rejected']);
        StudentProfile::where('user_id', $studentRegistration->user_id)
            ->update(['status' => 'rejected']);

        // Send notification to student.
        $user = $studentRegistration->user;
        Notification::send($user, new StudentStatusNotification('rejected'));

        return redirect()->route('admin.student_registrations.index')
            ->with('success', 'Student registration rejected.');
    }
    public function edit(StudentRegistration $studentRegistration)
    {
        // Load the edit view (create the view file: resources/views/admin/student_registrations/edit.blade.php)
        // The view should show the upgraded registration details and allow editing.
        return view('admin.student_registrations.edit', compact('studentRegistration'));
    }
    public function destroy(StudentRegistration $studentRegistration)
    {
        // Optionally, you may want to delete or soft-delete the registration record.
        $studentRegistration->delete();

        return redirect()->route('admin.student_registrations.index')
            ->with('success', 'Student registration deleted successfully.');
    }
    public function update(Request $request, StudentRegistration $studentRegistration)
    {
        // Validate basic registration and profile fields
        $validated = $request->validate([
            'registration_status' => 'required|in:pending,approved,rejected',
            'remarks' => 'nullable|string',
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'id_number' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'blood_group' => 'nullable|string|max:20',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'education' => 'required|array',
        ]);

        // Update the basic registration info
        $studentRegistration->update([
            'status' => $validated['registration_status'],
            'remarks' => $validated['remarks'] ?? null,
        ]);

        // Get student profile associated with the registration
        $profile = $studentRegistration->studentProfile;

        // Check if a profile picture is uploaded and update if so.
        if ($request->hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture')->store('uploads', 'public');
        } else {
            $profile_picture = $profile->profile_picture;
        }

        // Update the student profile, ensuring that the education field is stored as JSON.
        $profile->update([
            'full_name'         => $validated['full_name'],
            'father_name'       => $validated['father_name'],
            'dob'               => $validated['dob'],
            'id_number'         => $validated['id_number'],
            'mobile'            => $validated['mobile'],
            'profile_picture'   => $profile_picture,
            'nationality'       => $validated['nationality'],
            'religion'          => $validated['religion'],
            'gender'            => $validated['gender'],
            'blood_group'       => $validated['blood_group'] ?? null,
            'present_address'   => $validated['present_address'],
            'permanent_address' => $validated['permanent_address'],
            // Encode the education array to JSON before saving
            'education'         => json_encode($validated['education']),
        ]);

        return redirect()->route('admin.student_registrations.show', $studentRegistration)
            ->with('success', 'Student registration updated successfully.');
    }
}
