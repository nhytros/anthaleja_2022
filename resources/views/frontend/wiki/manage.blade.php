@extends('layouts.frontend.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/markdown/dist/simplemde.min.css') }}">
@endsection
@section('js')
    {{-- <script src="{{ asset('assets/js/tinymce.min.js') }}" referrerpolicy="origin"></script> --}}
    <script src="{{ asset('assets/markdown/dist/simplemde.min.js') }}" referrerpolicy="origin"></script>
@endsection
@section('content')
    <div class="container fluid">
        <div class="card shadow">
            <form
                action="@if ($edit) {{ route('wiki.update', $page->id) }} @else {{ route('wiki.save') }} @endif"
                method="post">@csrf
                <div class="card-header">
                    <span class="d-flex justify-content-between">
                        <h4>{{ $edit ? $page->title : trans('wiki.add') }}</h4>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </span>
                </div>
                <div class="card-body">
                    <div class="input-group mb-2">
                        <span class="input-group-text">{{ __('Title') }}</span>
                        <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}"
                            value="{{ $edit ? $page->title : old('title') }}" />
                    </div>
                    <textarea name="body" id="body" class="mb-2">{{ $edit ? $page->body : old('body') }}</textarea>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
    @include('frontend.wiki.layouts.partials._tinymce')
@endsection
