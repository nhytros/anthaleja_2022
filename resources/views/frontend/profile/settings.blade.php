@extends('layouts.frontend.main')
@section('content')
    <div class="card shadow mt-2">
        <h4 class="card-header">{{ __('Settings') }}</h4>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('profile.postPassword') }}" method="post">@csrf
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
                            <div class="card-footer text-end">
                                <input type="submit" class="btn btn-primary" value="{{ trans('frontier.password.save') }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6"></div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.partials._sidebar')
@endsection
