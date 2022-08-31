@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="h4 card-header">{{ $title }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->username) }}" method="post">@csrf
                            <div class="input-group mb-2">
                                <span class="input-group-text">
                                    <x-fas-user />
                                </span>
                                <input type="text" class="form-control" name="username" placeholder="Username"
                                    value="{{ old('username') }}" />
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
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                    </div>
                    <div class="card-footer">
                        {{-- <div class="mb-2"> --}}
                        <div class="text-end">
                            <input type="submit" class="btn btn-primary" value="{{ __('Save') }}">
                        </div>
                    </div>

                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow mb-2">
                    <div class="h4 card-header d-flex">
                        <div class="flex-grow-1">
                            {{ __('Roles & Permissions') }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card shadow mb-2">
                            <div class="card-body">
                                @if ($user->roles)
                                    <h5>{{ __('Roles') }}</h5>
                                    @forelse ($user->roles as $ur)
                                        <a href="{{ route('admin.user.role.revoke', [$user->username, $ur->name]) }}"
                                            class="nodec badge text-bg-primary">{{ $ur->name }}</a>
                                    @empty
                                        <h6 class="bg-warning p-1">{!! trans('admin.user.role.not_have', ['name' => $ur->name]) !!}</h6>
                                    @endforelse
                                    <div id="hint">
                                        <small>{{ trans('admin.user.role.click_to_revoke') }}</small>
                                    </div>
                                @endif
                                <form action="{{ route('admin.user.role.assign', $user->username) }}" method="post">@csrf
                                    <div class="input-group">
                                        <label class="input-group-text" for="igRoles">{{ __('Roles') }}</label>
                                        <select class="form-select" name="role" id="igRoles">
                                            <option selected>{{ trans('admin.role.choose') }}</option>
                                            @foreach ($roles as $r)
                                                <option value="{{ $r->name }}">{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                        <input class="btn btn-primary" type="submit" value="{{ __('Assign') }}" />
                                    </div>
                                </form>
                                <hr>


                                @if ($user->permissions != null)
                                    <h5>{{ __('Permissions') }}</h5>
                                    @forelse ($user->permissions as $up)
                                        <a href="{{ route('admin.user.permission.revoke', [$user->username, $up->name]) }}"
                                            class="nodec badge text-bg-primary">{{ $up->name }}</a>
                                    @empty
                                        <h6 class="bg-warning p-1">{!! trans('admin.user.permission.not_have') !!}</h6>
                                    @endforelse
                                    <div id="hint">
                                        <small>{{ trans('admin.user.permission.click_to_revoke') }}</small>
                                    </div>
                                @endif
                                <form action="{{ route('admin.user.permission.assign', $user->username) }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <label class="input-group-text" for="igPermissions">{{ __('Permissions') }}</label>
                                        <select class="form-select" name="Permission" id="igpermissions">
                                            <option selected>{{ trans('admin.permission.choose') }}</option>
                                            @foreach ($permissions as $p)
                                                <option value="{{ $p->name }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                        <input class="btn btn-primary" type="submit" value="{{ __('Assign') }}" />
                                    </div>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
