<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\StudentProfile;

class StudentRegistrationController extends Controller
{
    /**
     * Show the student registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.student.register');
    }

    /**
     * Handle the registration form submission.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            // Basic Information
            'full_name'           => 'required|string|max:255',
            'father_name'         => 'required|string|max:255',
            'dob'                 => 'required|date',
            'id_number'           => 'required|string|max:255',
            'mobile'              => 'required|string|max:255',
            // Optional picture upload
            'profile_picture'     => 'nullable|image|max:2048',
            // Educational Qualifications (nullable)
            'education'           => 'nullable|array',
            // Additional fields
            'nationality'         => 'required|string|max:255',
            'religion'            => 'required|string|max:255',
            'gender'              => 'required|string|in:Male,Female,Other',
            'blood_group'         => 'nullable|string|max:10',
            'present_address'     => 'required|string',
            'permanent_address'   => 'required|string',
        ]);

        $user = Auth::user();

        // Handle file upload if present
        $picturePath = null;
        if ($request->hasFile('profile_picture')) {
            $picturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Create or update the StudentRegistration record and set status to "pending".
        StudentRegistration::updateOrCreate(
            ['user_id' => $user->id],
            ['status' => 'pending']
        );

        // Create or update the associated StudentProfile record.
        StudentProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name'         => $validated['full_name'],
                'father_name'       => $validated['father_name'],
                'dob'               => $validated['dob'],
                'id_number'         => $validated['id_number'],
                'mobile'            => $validated['mobile'],
                'profile_picture'   => $picturePath,
                'education'         => isset($validated['education']) ? json_encode($validated['education']) : null,
                'nationality'       => $validated['nationality'],
                'religion'          => $validated['religion'],
                'gender'            => $validated['gender'],
                'blood_group'       => $validated['blood_group'] ?? null,
                'present_address'   => $validated['present_address'],
                'permanent_address' => $validated['permanent_address'],
                'status'            => 'pending',
            ]
        );

        return redirect()->route('student.dashboard')
            ->with('status', 'Registration submitted. Await admin approval.');
    }
}
