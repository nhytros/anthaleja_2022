@extends('layouts.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $title }}</h4>
                    <div id="header_actions">
                        @if ($user->can('course.create'))
                            <a href="{{ route('admin.school.course.create') }}" class="btn btn-sm btn-success">
                                {!! getIcon('fas', 'plus') !!} {{ trans('school.course.create') }}
                            </a>
                        @endif
                    </div>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <span class="d-flex justify-content-between">
                                    <h4>{{ $title }}</h4>
                                    <div id="header_actions">
                                        @if ($user->can('create.course'))
                                            <a href="{{ route('admin.school.course.create') }}"
                                                class="btn btn-sm btn-success">
                                                {!! getIcon('fas', 'plus') !!} {{ trans('school.course.create') }}
                                            </a>
                                        @endif
                                    </div>
                                </span>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>{{ __('Course') }}</td>
                                            <td>{{ __('Teacher') }}</td>
                                            <td>{{ __('Batch fine') }}</td>
                                            <td>{{ __('Schedule') }}</td>
                                            <td>{{ __('Actions') }}</td>
                                        </tr>
                                    </thead>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->teacher->first_name }}</td>
                                            <td>{{ $course->batch_time }}</td>
                                            <td>{{ $course->schedule->format('Y, d/m G:i') }}</td>
                                            <td>{!! dred($course, 'slug', 'school.course', 'course', 1, 1, 1, 1) !!}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
