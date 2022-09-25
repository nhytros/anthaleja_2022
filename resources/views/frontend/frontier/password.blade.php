@extends('layouts.frontend.main')
@section('content')
    <form action="{{ route('frontier.postPassword') }}" method="post">@csrf
        <div class="row justify-content-center">

            <div class="col-6 mt-3">
                <div class="card shadow">
                    <h5 class="card-header">{{ trans('frontier.password.change') }}</h5>
                    <div class="card-body">
                        <div class="input-group mb-2">
                            <span class="input-group-text">{!! getIcon('fas', 'lock') !!}</span>
                            <input type="password" name="old_password" class="form-control"
                                placeholder="{{ trans('frontier.password.current') }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">{!! getIcon('fas', 'lock') !!}</span>
                            <input type="password" name="new_password" class="form-control"
                                placeholder="{{ trans('frontier.password.new') }}">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">{!! getIcon('fas', 'lock') !!}</span>
                            <input type="password" name="new_password_confirmation" class="form-control"
                                placeholder="{{ trans('frontier.password.confirm_new') }}">
                        </div>
                    </div>
                    <div class="card-footer justify-content-end">
                        <input type="submit" class="btn btn-primary" value="{{ trans('frontier.password.save') }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
