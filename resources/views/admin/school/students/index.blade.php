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
                                {!! getIcon('fas', 'plus') !!} {{ trans('school.student.add') }}
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
                                                {!! getIcon('fas', 'plus') !!} {{ trans('school.student.add') }}
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
                                            <td>{!! dred($student, 'id', 'school.student', 'student', 1, 1, 1, 1) !!}</td>
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
