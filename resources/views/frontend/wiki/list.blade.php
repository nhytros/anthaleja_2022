@extends('layouts.frontend.main')
@section('content')
    <div class="container fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $title }}</h4>
                    <div id="header_actions">
                        <div class="btn-group">
                            <a href="{{ route('wiki.add') }}" class="btn btn-sm btn-success">
                                <x-fas-plus /> {{ trans('wiki.page.add') }}
                            </a>
                            <button type="button" class="btn btn-teal dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                                <span>
                                    <x-fas-filter />
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('wiki.list', 'my_wikis') }}">My pages</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>{{ __('Title') }}</td>
                            <td>{{ __('Author') }}</td>
                            <td>{{ __('Created at') }}</td>
                            <td>{{ __('Updated at') }}</td>
                            <td>{{ __('Actions') }}</td>
                        </tr>
                    </thead>
                    @foreach ($pages as $page)
                        @php
                            $character = \App\Models\Character::find($page->character_id)->first();
                        @endphp
                        <tr>
                            <td>{{ $page->title }}</td>
                            <td>{{ $character->username }}</td>
                            <td>{{ $page->created_at->diffForHumans() }}</td>
                            <td>{{ $page->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                    <a href="{{ route('wiki.show', $page->slug) }}" class="btn btn-success btn-sm">
                                        <x-fas-eye />
                                    </a>
                                    @if ($page->character_id == auth()->user()->character->id)
                                        <a href="{{ route('wiki.edit', $page->id) }}" class="btn btn-primary btn-sm">
                                            <x-fas-edit />
                                        </a>
                                        <a href="{{ route('wiki.delete', $page->id) }}" class="btn btn-warning btn-sm">
                                            <x-fas-trash />
                                        </a>
                                        @if ($page->trashed())
                                            <a href="{{ route('wiki.restore', $page->id) }}" class="btn btn-orange btn-sm">
                                                <x-fas-undo />
                                            </a>
                                            <a href="{{ route('wiki.destroy', $page->id) }}" class="btn btn-danger btn-sm">
                                                <x-fas-times />
                                            </a>
                                        @endif
                                    @endif
                                    {{-- @IsAdmin
                                    {{ 'destroy' }}
                                @endIsAdmin --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
