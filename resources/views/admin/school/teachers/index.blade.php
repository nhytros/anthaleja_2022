@extends('layouts.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $title }}</h4>
                    <div id="header_actions">
                        @if ($user->can('teacher.create'))
                            <a href="{{ route('admin.school.teacher.add') }}" class="btn btn-sm btn-success">
                                <x-fas-plus /> {{ trans('school.teacher.add') }}
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
                                        @if ($user->can('create.teacher'))
                                            <a href="{{ route('admin.school.teacher.add') }}"
                                                class="btn btn-sm btn-success">
                                                <x-fas-plus /> {{ trans('school.teacher.add') }}
                                            </a>
                                        @endif
                                    </div>
                                </span>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>{{ __('teacher') }}</td>
                                            <td>{{ __('Roll #') }}</td>
                                            <td>{{ __('Standard') }}</td>
                                            <td>{{ __('Actions') }}</td>
                                        </tr>
                                    </thead>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->character->last_name }} {{ $teacher->character->first_name }}
                                            </td>
                                            <td>{{ $teacher->roll_no }}</td>
                                            <td>{{ $teacher->standard }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                                    @if ($user->can('teacher.edit'))
                                                        <a href="{{ route('admin.school.teacher.edit', $teacher->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <x-fas-edit />
                                                        </a>
                                                    @endif
                                                    @if ($user->can('teacher.delete'))
                                                        <a href="{{ route('admin.school.teacher.delete', $teacher->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <x-fas-trash />
                                                        </a>
                                                    @endif
                                                    @if ($user->can('teacher.restore'))
                                                        @if ($teacher->trashed())
                                                            <a href="{{ route('admin.school.teacher.restore', $teacher->id) }}"
                                                                class="btn btn-orange btn-sm">
                                                                <x-fas-undo />
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if ($user->can('teacher.destroy'))
                                                        <a href="{{ route('admin.school.teacher.destroy', $teacher->id) }}"
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
