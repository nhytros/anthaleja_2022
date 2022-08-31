<div class="card shadow mb-2">
    <div class="card-header h6">Status</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item m-0 p-0" title="Energy: {{ auth()->user()->character->energy }}%">
                <div class="d-flex">
                    <x-fas-burn class="mt-2 ms-1" />
                    <div class="p-2 flex-grow-1">
                        <div class="progress">
                            <div class="progress-bar bg-{{ getStatus('energy')['color'] }}" role="progressbar"
                                style="width: {{ getStatus('energy')['status'] }}%;"
                                aria-valuenow="{{ getStatus('energy')['status'] }}" aria-valuemin="0"
                                aria-valuemax="100">
                                {{ getStatus('energy')['status'] }}%
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item m-0 p-0" title="Hunger: {{ auth()->user()->character->hunger }}%">
                <div class="d-flex">
                    <x-fas-hamburger class="mt-2 ms-1" />
                    <div class="p-2 flex-grow-1">
                        <div class="progress">
                            <div class="progress-bar bg-{{ getStatus('hunger', 1)['color'] }}" role="progressbar"
                                style="width: {{ getStatus('hunger', 1)['status'] }}%;"
                                aria-valuenow="{{ getStatus('hunger', 1)['status'] }}" aria-valuemin="0"
                                aria-valuemax="100">
                                {{ getStatus('hunger', 1)['status'] }}%
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item m-0 p-0" title="Thirst: {{ auth()->user()->character->thirst }}%">
                <div class="d-flex">
                    <x-fas-beer class="mt-2 ms-1" />
                    <div class="p-2 flex-grow-1">
                        <div class="progress">
                            <div class="progress-bar bg-{{ getStatus('thirst', 1)['color'] }}" role="progressbar"
                                style="width: {{ getStatus('thirst', 1)['status'] }}%;"
                                aria-valuenow="{{ getStatus('thirst', 1)['status'] }}" aria-valuemin="0"
                                aria-valuemax="100">
                                {{ getStatus('thirst', 1)['status'] }}%
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
