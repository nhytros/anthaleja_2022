@extends('layouts.frontend.main')
@section('js')
    <script src="{{ asset('assets/js/parsley.min.js') }}"></script>
@endsection
@section('content')
    <section class="container">
        <div class="card shadow mt-2">
            <form action="{{ route('frontier.postRegister') }}" method="post">@csrf
                <div class="row mx-2">
                    <div class="col-6 mt-3">
                        <div class="card shadow mb-2">
                            <div class="h4 card-header text-center">{{ __('User creation') }}</div>
                            <div class="card-body">
                                <div class="input-group mb-2">
                                    <span class="input-group-text">{!! getIcon('fas', 'user') !!}</span>
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        value="{{ old('username') }}" autofocus />
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">{!! getIcon('fas', 'envelope') !!}</span>
                                    <input type="text" class="form-control" name="email" placeholder="E-mail"
                                        value="{{ old('email') }}" />
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">{!! getIcon('fas', 'lock') !!}</span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">{!! getIcon('fas', 'lock') !!}</span>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        @include('frontend.character.form_character_create')
                    </div>
                </div>
        </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-evenly">
                <a href="{{ route('frontier.login') }}" class="btn btn-secondary">Login</a>
                <button type="submit" class="next btn btn-primary float-end">{{ __('Create User & Character') }}</button>
            </div>
        </div>
        </form>
        </div>

    </section>
@endsection
