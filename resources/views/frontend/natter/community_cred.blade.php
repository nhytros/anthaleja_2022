@extends('layouts.frontend.main')
@section('content')
    <div class="card shadow mt-2">
        <form action="{{ $edit ? route('natter.community.update', $community->slug) : route('natter.community.store') }}"
            method="post">@csrf
            <div class="card-body">
                <div class="input-group mb-2">
                    <span class="input-group-text">{{ __('Name') }}</span>
                    <input type="text" name="name" class="form-control"
                        value="{{ $edit ? $community->name : old('name') }}"
                        placeholder="{{ trans('natter.community.name') }}" autofocus />
                </div>
                {{-- <div class="input-group mb-2">
                    <span class="input-group-text">{{ __('Slug') }}</span>
                    <input type="text" name="slug" class="form-control" value="{{ ($edit)?$community->slug:old('slug') }}"
                        placeholder="{{ trans('natter.community.slug') }}" />
                </div> --}}
                <div class="input-group mb-2">
                    <span class="input-group-text">{{ __('Description') }}</span>
                    <textarea name="description" class="form-control" placeholder="{{ trans('natter.community.description') }}">{{ $edit ? $community->description : old('description') }}</textarea>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="submit" class="btn btn-primary"
                    value="{{ trans($edit ? 'natter.community.update' : 'natter.community.create') }}" />
            </div>
        </form>
    </div>
    @include('layouts.frontend.partials._sidebar')
@endsection
