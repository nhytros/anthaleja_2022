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
                                    <th>{{ __('Permission') }}</th>
                                    <th class="text-end">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            @foreach ($permissions as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                            <a href="{{ route('admin.permission.edit', $p->name) }}"
                                                class="btn btn-primary btn-sm">
                                                <x-fas-edit />
                                            </a>
                                            <a href="{{ route('admin.permission.delete', $p->name) }}"
                                                class="btn btn-warning btn-sm">
                                                <x-fas-trash />
                                            </a>
                                            @if ($p->trashed())
                                                <a href="{{ route('admin.permission.restore', $p->name) }}"
                                                    class="btn btn-orange btn-sm">
                                                    <x-fas-undo />
                                                </a>
                                                <a href="{{ route('admin.permission.destroy', $p->name) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <x-fas-times />
                                                </a>
                                            @endif
                                        </div>

                                    </td>
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
                            {!! !$edit ? trans('admin.permission.create') : trans('admin.permission.update', ['name' => $permission->name]) !!}
                        </div>
                        <div class="pe-2">
                            @if ($edit)
                                <a class="nodec btn btn-sm btn-secondary" href="{{ route('admin.permissions') }}">
                                    <x-fas-arrow-circle-left /> {{ __('Cancel') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ !$edit ? route('admin.permission.store') : route('admin.permission.update', $permission->name) }}"
                            method="post">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text" id="perm_name">{{ __('Permission') }}</span>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ !$edit ? old('name') : $permission->name }}" autofocus
                                    aria-describedby="perm_name" />
                                <input class="btn btn-primary" type="submit" value="{{ __('Save') }}" />
                            </div>
                        </form>
                    </div>
                </div>
                @if ($edit)
                    @if ($permission->roles)
                        <h5>{!! trans('admin.permission.role.for', ['name' => $permission->name]) !!}</h5>
                        @forelse ($permission->roles as $pr)
                            <a href="{{ route('admin.permission.role.remove', [$permission->name, $pr->name]) }}"
                                class="nodec badge text-bg-primary">{{ $pr->name }}</a>
                        @empty
                            <h6 class="bg-warning p-1">{!! trans('admin.permission.role.not_have', ['name' => $permission->name]) !!}</h6>
                        @endforelse
                        <div id="hint">
                            <small>{{ trans('admin.permission.role.click_to_revoke') }}</small>
                        </div>
                        <hr>
                    @endif
                    <div class="card shadow mb-2">
                        <div class="h5 card-header d-flex">
                            <div class="flex-grow-1">
                                {{ trans('admin.role.permission.permission_role') }}
                            </div>
                            <div class="pe-2">
                                @if ($edit)
                                    <a class="nodec btn btn-sm btn-secondary" href="{{ route('admin.roles') }}">
                                        <x-fas-arrow-circle-left /> {{ __('Cancel') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($edit)
                                <form action="{{ route('admin.permission.roles', $permission->name) }}" method="post">
                                    @csrf
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
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
