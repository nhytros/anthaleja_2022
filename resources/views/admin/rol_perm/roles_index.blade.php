@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="h4 card-header">{{ $title }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Role') }}</th>
                                    <th class="text-end">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            @foreach ($roles as $r)
                                <tr>
                                    <td>{{ $r->name }}</td>
                                    <td class="text-end">{!! dred($r, 'name', 'role', 'user', 1, 1, 1, 1) !!}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow mb-2">
                    <div class="h5 card-header d-flex">
                        <div class="flex-grow-1">
                            {!! !$edit ? trans('admin.role.create') : trans('admin.role.update', ['name' => $role->name]) !!}
                        </div>
                        <div class="pe-2">
                            @if ($edit)
                                <a class="nodec btn btn-sm btn-secondary" href="{{ route('admin.roles') }}">
                                    {!! getIcon('fas', 'arrow-circle-left') !!} {{ __('Cancel') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ !$edit ? route('admin.role.store') : route('admin.role.update', $role->name) }}"
                            method="post">
                            @csrf
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="igRole">{{ __('Role') }}</span>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ !$edit ? old('name') : $role->name }}" autofocus aria-describedby="igRole" />
                                <input class="btn btn-primary" type="submit" value="{{ __('Save') }}" />
                            </div>
                        </form>
                    </div>
                </div>

                @if ($edit)
                    @if ($role->permissions)
                        <h5>{!! trans('admin.role.permission.for', ['name' => $role->name]) !!}</h5>
                        @forelse ($role->permissions as $rp)
                            <a href="{{ route('admin.role.permission.revoke', [$role->name, $rp->name]) }}"
                                class="nodec badge text-bg-primary">{{ $rp->name }}</a>
                        @empty
                            <h6 class="bg-warning p-1">{!! trans('admin.role.permission.not_have', ['name' => $role->name]) !!}</h6>
                        @endforelse
                        <div id="hint">
                            <small>{{ trans('admin.role.permission.click_to_revoke') }}</small>
                        </div>
                        <hr>
                    @endif

                    <div class="card shadow mb-2">
                        <div class="h5 card-header d-flex">
                            <div class="flex-grow-1">
                                {{ trans('admin.permission.role_permission') }}
                            </div>
                            <div class="pe-2">
                                @if ($edit)
                                    <a class="nodec btn btn-sm btn-secondary" href="{{ route('admin.permissions') }}">
                                        {!! getIcon('fas', 'arrow-circle-left') !!} {{ __('Cancel') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($edit)
                                <form action="{{ route('admin.role.permissions', $role->name) }}" method="post">@csrf
                                    <div class="input-group">
                                        <label class="input-group-text" for="igPermissions">{{ __('Permissions') }}</label>
                                        <select class="form-select" name="permission" id="igPermissions">
                                            <option selected>{{ trans('admin.permission.choose') }}</option>
                                            @foreach ($permissions as $p)
                                                <option value="{{ $p->name }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                        <input class="btn btn-primary" type="submit" value="{{ __('Assign') }}" />
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
