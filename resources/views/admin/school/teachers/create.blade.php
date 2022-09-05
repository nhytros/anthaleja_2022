@extends('layouts.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $title }}</h4>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.school.student.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="input-group mb-2">
                        <span class="input-group-text">{{ __('Roll #') }}</span>
                        <input type="text" class="form-control" name="roll_no" value="{{ old('roll_no') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">{{ __('Last name') }}</span>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">{{ __('First name') }}</span>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            {!! getIcon('fas', 'calendar') !!}
                        </span>
                        <input type="date" class="form-control" name="schedule_date" placeholder="{{ __('Date') }}" />
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
