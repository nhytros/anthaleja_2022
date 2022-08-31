@extends('layouts.frontend.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                @include('frontend.bank.info')
            </div>
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <a href="{{ route('bank.atm') }}">ATM</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.bank.balance')
@endsection
