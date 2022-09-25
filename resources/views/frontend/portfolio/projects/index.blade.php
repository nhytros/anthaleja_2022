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
                                            <td>{{ __('Skill') }}</td>
                                            <td>{{ __('Actions') }}</td>
                                        </tr>
                                    </thead>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>
                                                @if ($project->image)
                                                    <img src="{{ '/storage/' . $project->image }}" width=36
                                                        alt="{{ $project->name }}" />
                                                @endif
                                                {{ $project->name }}
                                            </td>
                                            <td>{{ $project->skill->name }}</td>
                                            <td>{!! dred($project, 'id', 'portfolio.project', 'project', 1, 1, 1, 1) !!}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow">
                            <h5 class="card-header">{{ $edit ? __('Edit project') : __('Add new project') }}</h5>
                            <div class="card-body">
                                <form
                                    action="{{ $edit ? route('portfolio.project.update', $project->id) : route('portfolio.project.store') }}"
                                    method="post" enctype="multipart/form-data">@csrf
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">{!! getIcon('fas', 'book-open') !!}</span>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $edit ? $project->name : old('name') }}"
                                            placeholder="{{ __('Project name') }}" />
                                    </div>
                                    <div class="input-group mb-2">
                                        <label class="input-group-text" for="skillSelect">{{ __('Skill') }}</label>
                                        <select class="form-select" name="skill_id" id="skillSelect">
                                            <option>Choose...</option>
                                            @foreach ($skills as $skill)
                                                <option {{ $edit && $skill->id == $project->skill_id ? 'selected' : '' }}
                                                    value="{{ $skill->id }}">
                                                    {{ $skill->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($edit)
                                        <img src="{{ '/storage/' . $project->image }}" width=96
                                            alt="{{ $project->name }}" />
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
