@extends('layouts.frontend.main')
@section('content')
    <div class="container fluid">
        <div class="card shadow">
            <h4 class="card-header">{{ $title }}</h4>
            <div class="card-body">
                <form action="{{ route('litted.community.store') }}" method="post">@csrf
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('Name') }}</span>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}"
                            value="{{ old('name') }}" />
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('Description') }}</span>
                        <textarea name="description" id="description" class="form-control" rows=6 placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text w-10">{{ __('Slug') }}</span>
                        <input type="text" class="form-control" name="slug" placeholder="{{ __('Slug') }}"
                            value="{{ old('slug') }}" />
                    </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ trans('litted.community.create') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
