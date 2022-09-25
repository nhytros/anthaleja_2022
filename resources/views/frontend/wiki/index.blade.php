@extends('frontend.wiki.layouts.main')
@section('content')
    <div class="container fluid">
        <div class="card shadow">
            <h4 class="card-header">{{ $title }}</h4>
            <div class="card-body">
                {!! $page !!}
            </div>
        </div>
    </div>
@endsection

@section('side-links')
    {{-- <li class="nav-item">
                <a class="nav-link{{ Route::currentRouteName('admin.dashboard') ? ' active' : '' }}" aria-current="page"
                    href="{{ route('admin.dashboard') }}">
                    <span class="align-text-bottom">
                        {!! getIcon('fas','cloud') !!} {{ trans('admin.dashboard') }}
                    </span>
                </a>
            </li> --}}
    <li class="nav-item">
        <a href="#" class="nav-link">Homepage</a>
        <a href="#" class="nav-link">How to use this wiki</a>
        <a href="#" class="nav-link">Adding pages</a>
        <a href="#" class="nav-link">List all Categories</a>
    </li>
    <h5>Main categories</h5>
    <a href="#" class="nav-link">CategoryWikiPlugin</a>
    <a href="#" class="nav-link">CategoryActionPage</a>
    <h5>Search</h5>
    <form action="" method="post">@csrf
        <input type="search" name="search" id="search">
        <button type="submit" value="title">Title</button>
        <button type="submit" value="fulltext">Fulltext</button>
    </form>
    <h5>Toolbox</h5>
    <a href="#" class="nav-link">Recent Changes</a>
    <a href="#" class="nav-link">Recent New Pages</a>
    <a href="#" class="nav-link">What Links Here</a>
    <a href="#" class="nav-link">Upload File</a>
    <a href="#" class="nav-link">Preferences</a>
    <a href="#" class="nav-link">Printable version</a>
    <a href="#" class="nav-link">All pages</a>
    <a href="#" class="nav-link">Administration</a>
@endsection
