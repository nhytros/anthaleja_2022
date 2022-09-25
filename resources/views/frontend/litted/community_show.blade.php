@extends('frontend.litted.layouts.main')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <span class="d-flex justify-content-between">
                <h4>{!! gravatar($community->slug, 24, 'identicon') !!} {{ config('ath.litted.c_prefix') . $title }}</h4>
                <div id="header_actions">
                    <a href="{{ route('litted.post.create', $community->slug) }}" class="btn btn-sm btn-success">
                        {!! getIcon('fas', 'plus') !!} {{ trans('litted.community.post.create') }}
                    </a>
                </div>
            </span>
        </div>
        <div class="card-body">
            @foreach ($posts as $post)
                <div class="card shadow mb-3">
                    <span class="d-flex justify-content-start">
                        @include('frontend.litted.layouts.partials._votes')
                        <div id="top">
                            <ul class="list-group mt-3">

                                <li class="list-group-item borderless">
                                    <small class="text-muted">{{ __('Posted by') }}
                                        {{ config('ath.litted.u_prefix') . $post->character->username }}
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </li>
                                <li class="list-group-item borderless">
                                    <a class="h5 nodec"
                                        href="{{ route('litted.posts.show', [$community->slug, $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>

                                </li>

                        </div>
                    </span>
                    <div class="card-body">
                        {!! $post->body !!}
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('litted.posts.show', [$community->slug, $post->slug]) }}"
                            class="btn btn-primary">{{ __('Read more...') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
