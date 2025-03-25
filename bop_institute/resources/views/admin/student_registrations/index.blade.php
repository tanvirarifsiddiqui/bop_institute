@extends('layouts.admin_app')
@section('title', 'Student Registrations')
@section('content')
    <style>
        /* Custom CSS for tabs */
        .nav-tabs .nav-link {
            color: #fff;
            background-color: #0572dd;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #004a99;
            color: #fff;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #004a99;
            border-color: #004a99;
        }

        .tab-content {
            border: 1px solid #ddd;
            border-top: none;
            padding: 15px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
    <div class="container mt-4">
        <h1>Student Registrations & Registered Students</h1>
        {{-- Bootstrap Tab Layout --}}
        <ul class="nav nav-tabs justify-content-center" id="studentTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="registrations-tab" data-bs-toggle="tab" data-bs-target="#registrations" type="button" role="tab" aria-controls="registrations" aria-selected="true">
                    Pending Registrations
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="students-tab" data-bs-toggle="tab" data-bs-target="#students" type="button" role="tab" aria-controls="students" aria-selected="false">
                    Registered Student List
                </button>
            </li>
        </ul>
        <div class="tab-content" id="studentTabContent">
            {{-- Tab 1: Pending Registrations --}}
            <div class="tab-pane fade show active" id="registrations" role="tabpanel" aria-labelledby="registrations-tab">
                <div class="mt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Student Name</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pendingRegistrations as $registration)
                            <tr>
                                <td>{{ $registration->id }}</td>
                                <td>{{ $registration->user->name }}</td>
                                <td>{{ $registration->studentProfile->full_name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($registration->status) }}</td>
                                <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.student_registrations.show', $registration) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.student_registrations.edit', $registration) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.student_registrations.destroy', $registration) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this registration?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination can go here if needed --}}
                </div>
            </div>
            {{-- Tab 2: Registered Student List --}}
            <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                <div class="mt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
{{--                            <th>User</th>--}}
                            <th>Student Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Registration Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($approvedRegistrations as $registration)
                            <tr>
                                <td>{{ $registration->id }}</td>
{{--                                <td>{{ $registration->user->name }}</td>--}}
                                <td>{{ $registration->studentProfile->full_name ?? 'N/A' }}</td>
                                <td>{{ $registration->studentProfile->mobile ?? 'N/A' }}</td>
                                <td>{{ $registration->user->email }}</td>
                                <td>{{ ucfirst($registration->status) }}</td>
                                <td>
                                    <a href="{{ route('admin.student_registrations.show', $registration) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.student_registrations.edit', $registration) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.student_registrations.destroy', $registration) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination can go here if needed --}}
                </div>
            </div>
        </div>
    </div>
@endsection
