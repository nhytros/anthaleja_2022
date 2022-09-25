@extends('frontend.litted.layouts.main')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <span class="d-flex justify-content-between">
                <h4>{{ $title }}</h4>
                <div id="header_actions">
                    @if ($cancreate)
                        <a href="{{ route('litted.community.create') }}" class="btn btn-sm btn-success">
                            {!! getIcon('fas', 'plus') !!} {{ trans('litted.community.create') }}
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
                        <td>{!! dred($project, 'slug', 'litted.community', 'community', 1, 1, 1, 1) !!}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
