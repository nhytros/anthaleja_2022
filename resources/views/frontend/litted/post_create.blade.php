@extends('layouts.frontend.main')
@section('content')
    <div class="container fluid">
        <div class="card shadow">
            <h4 class="card-header">{{ $title }}</h4>
            <div class="card-body">
                <form action="{{ route('litted.post.store') }}" method="post">@csrf
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('Title') }}</span>
                        <input type="text" class="form-control" name="title" placeholder="{{ __('Name') }}"
                            value="{{ old('title') }}" autofocus />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('Slug') }}</span>
                        <input type="text" class="form-control" name="slug" placeholder="{{ __('Slug') }}"
                            value="{{ old('slug') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('URL') }}</span>
                        <input type="text" class="form-control" name="url" placeholder="{{ __('URL') }}"
                            value="{{ old('url') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('Content') }}</span>
                        <textarea name="body" id="body" class="form-control" rows=6
                            placeholder="{{ trans('litted.community.post.body') }}">{{ old('body') }}</textarea>
                    </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" name="community_id" value="{{ $community->id }}">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
