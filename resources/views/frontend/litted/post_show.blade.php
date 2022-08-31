@extends('frontend.litted.layouts.main')
@section('content')
    <div class="card shadow">
        <span class="d-flex justify-content-start">
            @include('frontend.litted.layouts.partials._votes')
            <div id="top">
                <ul class="list-group mt-3">
                    <li class="list-group-item borderless">
                        <a href="{{ route('litted.communities.show', $community->slug) }}"
                            class="nodec h5 link-primary">{!! gravatar($community->slug, 18, 'identicon') !!}
                            {{ config('ath.litted.c_prefix') . $community->name }}</a>
                    </li>
                    <li class="list-group-item borderless">
                        <small class="text-muted">{{ __('Posted by') }}
                            {{ config('ath.litted.u_prefix') . $post->character->username }}
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </li>
                    <li class="list-group-item borderless">
                        <h4 class="">{{ $title }}</h4>
                    </li>
                </ul>
            </div>
        </span>
        <div class="card-body">
            {!! $post->body !!}
        </div>
        <div class="card-footer d-flex">
            <div class="flex-fill">
                @if ($post->url)
                    <x-fas-link /> <a class="nodec link-primary" href="{{ $post->url }}"
                        target="_blank">{{ $post->url }}</a>
                @else
                    {{ ' ' }}
                @endif
            </div>
            <div class="flex-fill text-end">
                <div class="btn-group" role="group" aria-label="Action Buttons">
                    @if ($post->author_id == auth()->user()->character->id)
                        <a href="{{ route('litted.post.edit', $post->id) }}" class="btn btn-primary btn-sm">
                            <x-fas-edit />
                        </a>
                        <a href="{{ route('litted.post.delete', $post->id) }}" class="btn btn-warning btn-sm">
                            <x-fas-trash />
                        </a>
                        @if ($post->trashed())
                            <a href="{{ route('litted.post.restore', $post->id) }}" class="btn btn-orange btn-sm">
                                <x-fas-undo />
                            </a>
                            <a href="{{ route('litted.post.destroy', $post->id) }}" class="btn btn-danger btn-sm">
                                <x-fas-times />
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @auth
        <div class="p-2">
            <form action="{{ route('litted.posts.comments', [$community->slug, $post->id]) }}" method="post">
                @csrf
                <div class="input-group mb-2">
                    <span class="input-group-text">{{ __('Comment') }}</span>
                    <textarea name="comment" id="comment" class="form-control" rows=3
                        placeholder="{{ trans('litted.community.post.comment') }}">{{ old('comment') }}</textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('Post comment') }}</button>
                </div>
            </form>
        </div>
    @endauth
    {{-- {{ dd($post->comments) }} --}}
    @foreach ($post->comments as $c => $comment)
        <div class="card shadow mt-2">
            <small class="text-muted ms-2">{{ __('Commented by') }}
                {{ config('ath.litted.u_prefix') . $comment->character->username }}
                {{ $comment->created_at->diffForHumans() }}
            </small>
            <div class="card-body">
                {!! $comment->comment !!}
            </div>
        </div>
    @endforeach
@endsection
