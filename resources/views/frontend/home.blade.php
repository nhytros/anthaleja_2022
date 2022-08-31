@extends('layouts.frontend.main')
@section('content')
    <div class="container-fluid mt-2">
        <div class="card shadow">
            <div class="card-body">
                @include('layouts.frontend.partials._carousel')
            </div>
        </div>
    </div>
    @include('layouts.frontend.partials._sidebar')
@endsection
