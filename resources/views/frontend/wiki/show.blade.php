@extends('layouts.frontend.main')
@section('content')
    <div class="container fluid">
        <div class="card shadow">
            <div class="card-header">
                <span class="d-flex justify-content-between">
                    <h4>{{ $page->title }}</h4>
                    @if ($page->character_id == auth()->user()->character->id)
                        <a href="{{ route('wiki.edit', $page->id) }}" class="btn btn-primary btn-sm">
                            <x-fas-edit />
                        </a>
                    @endif
                </span>
            </div>
            <div class="card-body">
                {!! $parsedown->text($page->body) !!}
            </div>
        </div>
    </div>
@endsection
