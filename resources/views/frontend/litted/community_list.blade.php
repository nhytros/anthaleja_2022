@extends('frontend.litted.layouts.main')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <span class="d-flex justify-content-between">
                <h4>{{ $title }}</h4>
                <div id="header_actions">
                    @if ($cancreate)
                        <a href="{{ route('litted.community.create') }}" class="btn btn-sm btn-success">
                            <x-fas-plus /> {{ trans('litted.community.create') }}
                        </a>
                    @endif
                </div>
            </span>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>{{ __('Name') }}</td>
                        <td>{{ __('Owner') }}</td>
                        <td>{{ __('Created at') }}</td>
                        <td>{{ __('Actions') }}</td>
                    </tr>
                </thead>
                @foreach ($communities as $community)
                    <tr>
                        <td>
                            <a class="nodec" href="{{ route('litted.communities.show', $community->slug) }}">
                                {!! gravatar($community->name, 18, 'identicon') !!}
                                {{ config('ath.litted.c_prefix') . $community->name }}
                            </a>
                            ({{ $community->posts()->count() }})
                        </td>
                        <td>u/{{ $community->character->username }}</td>
                        <td>{{ $community->created_at->format('Y, d/m') }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action Buttons">
                                @if ($community->owner_id == auth()->user()->character->id)
                                    <a href="{{ route('litted.community.edit', $community->slug) }}"
                                        class="btn btn-primary btn-sm">
                                        <x-fas-edit />
                                    </a>
                                    <a href="{{ route('litted.community.delete', $community->slug) }}"
                                        class="btn btn-warning btn-sm">
                                        <x-fas-trash />
                                    </a>
                                    @if ($community->trashed())
                                        <a href="{{ route('litted.community.restore', $community->slug) }}"
                                            class="btn btn-orange btn-sm">
                                            <x-fas-undo />
                                        </a>
                                        <a href="{{ route('litted.community.destroy', $community->slug) }}"
                                            class="btn btn-danger btn-sm">
                                            <x-fas-times />
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
