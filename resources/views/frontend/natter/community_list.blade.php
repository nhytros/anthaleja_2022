@extends('layouts.frontend.main')
@section('content')
    <div class="container-fluid mt-2 mb-3">
        <div class="card">
            <h4 class="card-header">{{ 'Communities' }}</h4>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <td>{{ __('Name') }}</td>
                            <td>{{ __('Actions') }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    @foreach ($communities as $c)
                        <tr>
                            <td>{!! gravatar($c->name . $c->created_at, 36) !!} d/{{ $c->name }}</td>
                            @if (Auth::user()->character->id === $c->owner_id)
                                <td>{!! dred($c, 'slug', 'natter.community', 'community', 1, 1, 1, 1) !!}</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                {!! $communities->links() !!}
            </div>
        </div>
    </div>
@endsection
