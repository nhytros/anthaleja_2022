@extends('layouts.frontend.main')
@section('content')
    <div class="card" style="width: 18rem;">
        <h5 class="card-header">{{ trans('frontier.password.change') }}</h5>
        <div class="card-body">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('frontier.postPassword') }}" method="post">@csrf
        <div class="row justify-content-center">
            <div class="col-6 mt-3">
                <div class="input-group mb-2">
                    <span class="input-group-text">
                        <x-fas-lock />
                    </span>
                    <input type="password" name="old_password" class="form-control"
                        placeholder="{{ trans('frontier.password.current') }}">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">
                        <x-fas-lock />
                    </span>
                    <input type="password" name="new_password" class="form-control"
                        placeholder="{{ trans('frontier.password.new') }}">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">
                        <x-fas-lock />
                    </span>
                    <input type="password" name="new_password_confirmation" class="form-control"
                        placeholder="{{ trans('frontier.password.confirm_new') }}">
                </div>
                <div class="mb-2">
                    <input type="submit" class="btn btn-primary" value="{{ trans('frontier.password.save') }}">
                </div>
            </div>
        </div>
    </form>
@endsection
