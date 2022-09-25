@extends('layouts.frontend.main')
@section('content')
    <div class="card shadow mt-2">
        <div class="card-body">
            @include('layouts.frontend.partials._carousel')
        </div>
    </div>
    @include('layouts.frontend.partials._sidebar')
@endsection
