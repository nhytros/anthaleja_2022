@extends('layouts.admin.main')
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.0.1/js/tempus-dominus.min.js"></script>
@endsection
@section('css')
    <link href="//cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet"
        crossorigin="anonymous" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $title }}</h4>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.school.course.store') }}" method="post">@csrf
                    <div class="input-group mb-2">
                        @if (auth()->user()->role('admin'))
                            <span class="input-group-text">{{ __('Teacher') }}</span>
                            <select class="form-select" name="teacher_id">
                                <option value="">Select teacher...</option>
                                @foreach ($teacher as $t)
                                    <option value="{{ $t->character->id }}">{{ $t->character->last_name }}
                                        {{ $t->character->first_name }}</option>
                                @endforeach
                            </select>
                        @else
                            <span class="input-group-text">{{ __('Teacher') }}</span>
                            <input type="text" class="form-control" name="teacher"
                                value="{{ $teacher->last_name . ' ' . $teacher->first_name }}" disabled />
                            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}" />
                        @endif
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            {!! getIcon('fas', 'tag') !!}
                        </span>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Course name') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            {!! getIcon('fas', 'clock') !!}
                        </span>
                        <input type="text" class="form-control" name="batch_time"
                            placeholder="{{ __('Batch time') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            {!! getIcon('fas', 'calendar') !!}
                        </span>
                        <input type="date" class="form-control" name="schedule_date"
                            placeholder="{{ __('Date') }}" />
                        <select class="form-select" name="schedule_hour">
                            <option selected>Open this select menu</option>
                            @for ($h = 0; $h <= 23; $h++)
                                <option value="{{ $h }}">{{ $h }}</option>
                            @endfor
                        </select>
                        <select class="form-select" name="schedule_mins">
                            <option selected>Open this select menu</option>
                            @for ($m = 0; $m <= 55; $m += 5)
                                <option value="{{ $m }}">{{ $m }}</option>
                            @endfor
                        </select>
                        {{-- <input type="text" class="form-control" name="schedule_hour"
                            placeholder="{{ __('Hour') }}" /> --}}
                    </div>
                    <input type="submit" class="btn btn-primary" value="{{ __('Save') }}">
                </form>
            </div>
        </div>

    </div>
@endsection
