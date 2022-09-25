@extends('layouts.frontend.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <h4 class="card-header">{{ $title }}</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>{{ __('Name') }}</td>
                                            <td>{{ __('Actions') }}</td>
                                        </tr>
                                    </thead>
                                    @foreach ($skills as $skill)
                                        <tr>
                                            <td>
                                                @if ($skill->image)
                                                    <img src="{{ '/storage/' . $skill->image }}" width=36
                                                        alt="{{ $skill->name }}" />
                                                @endif
                                                {{ $skill->name }}
                                            </td>
                                            <td>{!! dred($skill, 'id', 'portfolio.skill', 'skill', 1, 1, 1, 1) !!}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow">
                            <h5 class="card-header">{{ $edit ? __('Edit skill') : __('Add new skill') }}</h5>
                            <div class="card-body">
                                <form
                                    action="{{ $edit ? route('portfolio.skill.update', $skill->id) : route('portfolio.skill.store') }}"
                                    method="post" enctype="multipart/form-data">@csrf
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">{!! getIcon('fas', 'book-open') !!}</span>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $edit ? $skill->name : old('name') }}"
                                            placeholder="{{ __('Skill name') }}" />
                                    </div>
                                    @if ($edit)
                                        <img src="{{ '/storage/' . $skill->image }}" width=96 alt="{{ $skill->name }}" />
                                    @endif
                                    <div class="input-group mb-2">
                                        <label class="input-group-text" for="image">{{ __('Image') }}</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">{{ __('Save') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
