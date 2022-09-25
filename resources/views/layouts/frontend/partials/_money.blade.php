<div class="card shadow mb-2">
    <div class="card-header h6">Money</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item m-0 p-0" title="Cash | {{ athel() . ' ' . auth()->user()->character->cash }}">
                <div class="d-flex">
                    {!! getIcon('fas', 'money-bill mt-2 ms-1') !!}
                    <div class="p-2 flex-grow-1">
                        {{ toAthel(auth()->user()->character->cash) }}
                    </div>
                </div>
            </li>
            <li class="list-group-item m-0 p-0"
                title="Bank Account: {{ auth()->user()->character->bank_account }} | {{ athel() . ' ' . auth()->user()->character->bank_amount }}">
                <div class="d-flex">
                    {!! getIcon('fas', 'money-check mt-2 ms-1') !!}
                    <div class="p-2 flex-grow-1">
                        {{ toAthel(auth()->user()->character->bank_amount) }}
                    </div>
                </div>
            </li>
            <li class="list-group-item m-0 p-0" title="Metals">
                <div class="d-flex">
                    {!! getIcon('fas', 'gem mt-2 ms-1') !!}
                    <div class="p-2 flex-grow-1">
                        {{ auth()->user()->character->metals }}
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
