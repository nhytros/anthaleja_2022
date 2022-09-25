@extends('layouts.frontend.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-3">
                <div class="card shadow">
                    <h4 class="card-header">{{ $title }}</h4>
                    <div class="card-body">
                        <a class="btn btn-lg btn-primary w-100 my-2"
                            href="{{ route('frontier.login') }}">{{ trans('frontier.enter_city') }}</a>
                        <a class="btn btn-lg btn-primary w-100 my-2"
                            href="{{ route('frontier.register') }}">{{ trans('frontier.register_office') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
