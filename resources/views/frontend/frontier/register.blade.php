@extends('layouts.frontend.main')
@section('content')
    <form action="{{ route('frontier.postRegister') }}" method="post">@csrf
        <div class="row justify-content-center">
            <div class="col-4 mt-3">
                <div class="mt-3 card shadow">
                    <div class="h4 card-header text-center">{{ $title }}</div>
                    <div class="card-body">
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <x-fas-user />
                            </span>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                value="{{ old('username') }}" autofocus>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <x-fas-envelope />
                            </span>
                            <input type="text" class="form-control" name="email" placeholder="E-mail"
                                value="{{ old('email') }}" />
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <x-fas-lock />
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <x-fas-lock />
                            </span>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- <div class="mb-2"> --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('frontier.login') }}" class="btn btn-secondary">Login</a>
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
