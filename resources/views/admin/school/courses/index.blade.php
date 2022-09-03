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
                                <x-fas-plus /> {{ trans('school.course.create') }}
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
                                                <x-fas-plus /> {{ trans('school.course.create') }}
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
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                                    @if ($user->can('course.edit'))
                                                        <a href="{{ route('admin.school.course.edit', $course->slug) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <x-fas-edit />
                                                        </a>
                                                    @endif
                                                    @if ($user->can('course.delete'))
                                                        <a href="{{ route('admin.school.course.delete', $course->slug) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <x-fas-trash />
                                                        </a>
                                                    @endif
                                                    @if ($user->can('course.restore'))
                                                        @if ($course->trashed())
                                                            <a href="{{ route('admin.school.course.restore', $course->slug) }}"
                                                                class="btn btn-orange btn-sm">
                                                                <x-fas-undo />
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if ($user->can('course.destroy'))
                                                        <a href="{{ route('admin.school.course.destroy', $course->slug) }}"
                                                            class="btn btn-danger btn-sm">
                                                            <x-fas-times />
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
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
