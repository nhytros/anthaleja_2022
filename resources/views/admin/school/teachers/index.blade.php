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
                                {!! getIcon('fas', 'plus') !!} {{ trans('school.teacher.add') }}
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
                                                {!! getIcon('fas', 'plus') !!} {{ trans('school.teacher.add') }}
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
                                            <td>{!! dred($teacher, 'id', 'school.teacher', 'teacher', 1, 1, 1, 1) !!}</td>
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
