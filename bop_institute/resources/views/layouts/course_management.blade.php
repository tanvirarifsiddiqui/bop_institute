@extends('layouts.admin_app')

@section('content')
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin.course_management.course_types.index') }}" class="list-group-item list-group-item-action">Manage Course Types</a>
                <a href="{{ route('admin.course_management.programs.index') }}" class="list-group-item list-group-item-action">Manage Programs</a>
                <a href="{{ route('admin.course_management.sessions.index') }}" class="list-group-item list-group-item-action">Manage Sessions</a>
                <a href="{{ route('admin.course_management.batches.index') }}" class="list-group-item list-group-item-action">Manage Batches</a>
                <a href="{{ route('admin.course_management.courses.index') }}" class="list-group-item list-group-item-action">Manage Courses</a>
            </div>
        </div>
        <div class="col-md-9">
            @yield('main')
        </div>
    </div>
    </div>
@endsection
