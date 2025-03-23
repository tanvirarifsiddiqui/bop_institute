@extends('layouts.admin_app')

@section('title', 'Edit Student Registration')

@section('content')
    <div class="container mt-5">
        <h2>Edit Student Registration Details</h2>
        <form method="POST" action="{{ route('admin.student_registrations.update', $studentRegistration->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h4>Basic Registration Details</h4>
            <div class="mb-3">
                <label for="status" class="form-label">Registration Status</label>
                <select name="registration_status" id="status" class="form-select">
                    <option value="pending" {{ $studentRegistration->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $studentRegistration->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $studentRegistration->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea name="remarks" id="remarks" class="form-control" rows="3">{{ old('remarks', $studentRegistration->remarks) }}</textarea>
            </div>

            <hr>
            <h4>Student Profile Details</h4>
            @php
                $profile = $studentRegistration->studentProfile;
            @endphp

            <div class="mb-3">
                <label for="full_name" class="form-label">Student Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $profile->full_name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="father_name" class="form-label">Father's Name</label>
                <input type="text" name="father_name" id="father_name" class="form-control" value="{{ old('father_name', $profile->father_name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $profile->dob ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="id_number" class="form-label">BRN/NID Number</label>
                <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number', $profile->id_number ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile', $profile->mobile ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                @if(isset($profile->profile_picture))
                    <div class="mb-2">
                        <img src="{{ asset('uploads/' . $profile->profile_picture) }}" alt="Profile Picture" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                @endif
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
            </div>

            <hr>
            <h4>Educational Qualifications</h4>
            @php
                $education = json_decode($profile->education, true) ?? [
                    'ssc' => ['exam_name' => 'SSC', 'passing_year' => '', 'gpa' => '', 'institution' => ''],
                    'hsc' => ['exam_name' => 'HSC', 'passing_year' => '', 'gpa' => '', 'institution' => ''],
                    'honours' => ['exam_name' => 'Honours', 'passing_year' => '', 'gpa' => '', 'institution' => ''],
                    'masters' => ['exam_name' => 'Masters', 'passing_year' => '', 'gpa' => '', 'institution' => '']
                ];
            @endphp
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
                @foreach($education as $key => $edu)
                    <tr>
                        <td>
                            <input type="hidden" name="education[{{ $key }}][exam_name]" value="{{ $edu['exam_name'] }}">
                            <strong>{{ $edu['exam_name'] }}</strong>
                        </td>
                        <td>
                            <input type="text" name="education[{{ $key }}][passing_year]" class="form-control" value="{{ old("education.$key.passing_year", $edu['passing_year']) }}" placeholder="Year">
                        </td>
                        <td>
                            <input type="text" name="education[{{ $key }}][gpa]" class="form-control" value="{{ old("education.$key.gpa", $edu['gpa']) }}" placeholder="GPA">
                        </td>
                        <td>
                            <input type="text" name="education[{{ $key }}][institution]" class="form-control" value="{{ old("education.$key.institution", $edu['institution']) }}" placeholder="Institution">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <hr>
            <h4>Additional Information</h4>

            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality', $profile->nationality ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="religion" class="form-label">Religion</label>
                <input type="text" name="religion" id="religion" class="form-control" value="{{ old('religion', $profile->religion ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ (old('gender', $profile->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ (old('gender', $profile->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ (old('gender', $profile->gender ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="blood_group" class="form-label">Blood Group</label>
                <input type="text" name="blood_group" id="blood_group" class="form-control" value="{{ old('blood_group', $profile->blood_group ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="present_address" class="form-label">Present Address</label>
                <textarea name="present_address" id="present_address" class="form-control" rows="3" required>{{ old('present_address', $profile->present_address ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="permanent_address" class="form-label">Permanent Address</label>
                <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3" required>{{ old('permanent_address', $profile->permanent_address ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Registration</button>
        </form>
    </div>
@endsection
