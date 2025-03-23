@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Student Registration</h1>
        <form method="POST" action="{{ route('student.register.submit') }}" enctype="multipart/form-data">
            @csrf

            <!-- Picture Upload -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" name="profile_picture" class="form-control" id="profile_picture">
            </div>

            <!-- Basic Student Information -->
            <div class="mb-3">
                <label for="full_name" class="form-label">Student Name</label>
                <input type="text" name="full_name" class="form-control" id="full_name" required>
            </div>
            <div class="mb-3">
                <label for="father_name" class="form-label">Father's Name</label>
                <input type="text" name="father_name" class="form-control" id="father_name" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" required>
            </div>
            <div class="mb-3">
                <label for="id_number" class="form-label">BRN/NID Number</label>
                <input type="text" name="id_number" class="form-control" id="id_number" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" name="mobile" class="form-control" id="mobile" required>
            </div>

            <!-- Educational Qualification -->
            <h4>Educational Qualification</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Passing Year</th>
                    <th>GPA</th>
                    <th>Board/University/College</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $exams = ['SSC', 'HSC', 'Honours', 'Masters'];
                @endphp
                @foreach($exams as $exam)
                    <tr>
                        <td>
                            <input type="hidden" name="education[{{ strtolower($exam) }}][exam_name]" value="{{ $exam }}">
                            <strong>{{ $exam }}</strong>
                        </td>
                        <td>
                            <input type="text" name="education[{{ strtolower($exam) }}][passing_year]" class="form-control" placeholder="Year">
                        </td>
                        <td>
                            <input type="text" name="education[{{ strtolower($exam) }}][gpa]" class="form-control" placeholder="GPA">
                        </td>
                        <td>
                            <input type="text" name="education[{{ strtolower($exam) }}][institution]" class="form-control" placeholder="Board/University/College">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Additional Information -->
            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" name="nationality" class="form-control" id="nationality" required>
            </div>
            <div class="mb-3">
                <label for="religion" class="form-label">Religion</label>
                <input type="text" name="religion" class="form-control" id="religion" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="blood_group" class="form-label">Blood Group</label>
                <input type="text" name="blood_group" class="form-control" id="blood_group">
            </div>
            <div class="mb-3">
                <label for="present_address" class="form-label">Present Address</label>
                <textarea name="present_address" class="form-control" id="present_address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="permanent_address" class="form-label">Permanent Address</label>
                <textarea name="permanent_address" class="form-control" id="permanent_address" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
