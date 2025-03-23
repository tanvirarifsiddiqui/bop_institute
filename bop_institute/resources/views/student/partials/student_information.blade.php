<div class="container py-4">
    <div class="row">
        <div class="col-md-3 text-center">
            @if($studentProfile->profile_picture)
                <img src="{{ asset('uploads/' . $studentProfile->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle border mb-3" style="max-width: 150px;">
            @else
                <img src="{{ asset('images/default_profile.png') }}" alt="Default Profile" class="img-fluid rounded-circle border mb-3" style="max-width: 150px;">
            @endif
            <h4 class="fw-bold">{{ $studentProfile->full_name }}</h4>
        </div>
        <div class="col-md-9">
            <h5 class="border-bottom pb-2 mb-3 fw-bold">Personal Information</h5>
            <table class="table table-borderless">
                @if($studentProfile->father_name)
                    <tr>
                        <th style="width: 30%;">Father's Name:</th>
                        <td>{{ $studentProfile->father_name }}</td>
                    </tr>
                @endif
                @if($studentProfile->dob)
                    <tr>
                        <th>Date of Birth:</th>
                        <td>{{ $studentProfile->dob }}</td>
                    </tr>
                @endif
                @if($studentProfile->gender)
                    <tr>
                        <th>Gender:</th>
                        <td>{{ $studentProfile->gender }}</td>
                    </tr>
                @endif
                @if($studentProfile->blood_group)
                    <tr>
                        <th>Blood Group:</th>
                        <td>{{ $studentProfile->blood_group }}</td>
                    </tr>
                @endif
                @if($studentProfile->religion)
                        <tr>
                        <th>Religion:</th>
                        <td>{{ $studentProfile->religion }}</td>
                    </tr>
                @endif
                @if($studentProfile->nationality)
                    <tr>
                        <th>Nationality:</th>
                        <td>{{ $studentProfile->nationality }}</td>
                    </tr>
                @endif
            </table>

            <h5 class="border-bottom pb-2 mb-3 fw-bold">Contact Information</h5>
            <table class="table table-borderless">
                @if($studentProfile->mobile)
                    <tr>
                        <th style="width: 30%;">Mobile:</th>
                        <td>{{ $studentProfile->mobile }}</td>
                    </tr>
                @endif
                @if($studentProfile->present_address)
                    <tr>
                        <th>Present Address:</th>
                        <td>{{ $studentProfile->present_address }}</td>
                    </tr>
                @endif
                @if($studentProfile->permanent_address)
                    <tr>
                        <th>Permanent Address:</th>
                        <td>{{ $studentProfile->permanent_address }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</div>
