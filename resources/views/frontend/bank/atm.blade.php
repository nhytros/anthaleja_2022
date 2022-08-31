@extends('layouts.frontend.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Withdraw</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Select amout to withdraw</h6>
                        <form action="{{ route('bank.withdraw') }}" method="post">@csrf
                            @foreach ($wdata as $w)
                                @hasAmount('bank_amount', $w)
                                    <button type="submit" value="{{ $w }}" name="amount"
                                        class="btn btn-lg btn-primary fw-2 w-100 mb-2">{{ toAthel($w) }}</button>
                                @endhasAmount
                            @endforeach
                            @hasAmount('bank_amount', 1)
                                <h6 class="card-subtitle mb-2 text-muted">or enter manually</h6>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">{{ athel() }}</span>
                                    <input type="number" class="form-control" name="amount_x" min="0"
                                        max="{{ Auth::user()->character->bank_amount }}">
                                    <span class="input-group-text">;00</span>
                                    <button type="submit" class="btn btn-lg btn-primary fw-2">Confirm</button>
                                </div>
                            @endhasAmount
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Deposit</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Select amout to deposit</h6>
                        <form action="{{ route('bank.deposit') }}" method="post">@csrf
                            @foreach ($ddata as $d)
                                @hasAmount('cash', $d)
                                    <button type="submit" value="{{ $d }}" name="amount"
                                        class="btn btn-lg btn-primary fw-2 w-100 mb-2">{{ toAthel($d) }}</button>
                                @endhasAmount
                            @endforeach
                            @hasAmount('cash', 1)
                                <h6 class="card-subtitle mb-2 text-muted">or enter manually</h6>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">{{ athel() }}</span>
                                    <input type="number" class="form-control" name="amount_x" min="0"
                                        max="{{ Auth::user()->character->cash }}">
                                    <button type="submit" class="btn btn-lg btn-primary fw-2">Confirm</button>
                                </div>
                            @endhasAmount
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                @hasAmount('bank_amount', 1)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Transfer</h5>
                            <form action="{{ route('bank.transfer') }}" method="post">@csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text">ATH-</span>
                                    <input type="text" class="form-control" name="bank_account" placeholder="Account no.">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">{{ athel() }}</span>
                                    <input type="number" class="form-control" name="amount" min="0"
                                        max="{{ Auth::user()->character->bank_amount }}">
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary fw-2">Confirm</button>
                            </form>
                        </div>
                    </div>
                @endhasAmount
            </div>
        </div>
    </div>
@endsection
