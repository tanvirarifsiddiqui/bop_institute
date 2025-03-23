@php
    $education = json_decode($studentProfile->education, true) ?? [];
@endphp

@if(!empty($education))
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th>Exam Name</th>
                <th>Passing Year</th>
                <th>GPA</th>
                <th>Institution</th>
            </tr>
            </thead>
            <tbody>
            @foreach($education as $key => $edu)
                <tr>
                    <td>{{ $edu['exam_name'] }}</td>
                    <td>{{ $edu['passing_year'] }}</td>
                    <td>{{ $edu['gpa'] }}</td>
                    <td>{{ $edu['institution'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-warning">
        No educational qualifications available.
    </div>
@endif
