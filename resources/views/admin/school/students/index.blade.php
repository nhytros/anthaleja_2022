@extends('layouts.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $title }}</h4>
                    <div id="header_actions">
                        @if ($user->can('student.create'))
                            <a href="{{ route('admin.school.student.add') }}" class="btn btn-sm btn-success">
                                <x-fas-plus /> {{ trans('school.student.add') }}
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
                                        @if ($user->can('create.student'))
                                            <a href="{{ route('admin.school.student.add') }}"
                                                class="btn btn-sm btn-success">
                                                <x-fas-plus /> {{ trans('school.student.add') }}
                                            </a>
                                        @endif
                                    </div>
                                </span>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>{{ __('Student') }}</td>
                                            <td>{{ __('Roll #') }}</td>
                                            <td>{{ __('Standard') }}</td>
                                            <td>{{ __('Actions') }}</td>
                                        </tr>
                                    </thead>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->character->last_name }} {{ $student->character->first_name }}
                                            </td>
                                            <td>{{ $student->roll_no }}</td>
                                            <td>{{ $student->standard }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                                    @if ($user->can('student.edit'))
                                                        <a href="{{ route('admin.school.student.edit', $student->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <x-fas-edit />
                                                        </a>
                                                    @endif
                                                    @if ($user->can('student.delete'))
                                                        <a href="{{ route('admin.school.student.delete', $student->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <x-fas-trash />
                                                        </a>
                                                    @endif
                                                    @if ($user->can('student.restore'))
                                                        @if ($student->trashed())
                                                            <a href="{{ route('admin.school.student.restore', $student->id) }}"
                                                                class="btn btn-orange btn-sm">
                                                                <x-fas-undo />
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if ($user->can('student.destroy'))
                                                        <a href="{{ route('admin.school.student.destroy', $student->id) }}"
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
