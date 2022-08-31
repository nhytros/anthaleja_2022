<div class="card text-bg-primary mb-3">
    <div class="card-header">{{ auth()->user()->character->bank_account }}</div>
    <div class="card-body">
        <h6 class="card-title">Actual balance</h6>
        <h2 class="card-title">{{ toAthel(auth()->user()->character->bank_amount) }}</h2>
    </div>
</div>
