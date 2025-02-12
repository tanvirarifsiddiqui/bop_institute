<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all(); // Consider using pagination
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a newly created user
    public function store(Request $request)
    {
        // Validate and store the new user
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'mobile_no'   => 'required|string|max:20',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'birth_date'  => 'nullable|date',
            'institution' => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:500',
            'gender'      => 'nullable|in:Male,Female,Other', // Adjust options as needed
            // Exclude 'password' from validation rules
        ]);

        // Update user with the validated data
        $user->update($request->only([
            'name',
            'mobile_no',
            'email',
            'birth_date',
            'institution',
            'address',
            'gender',
        ]));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }


    // Remove the specified user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
