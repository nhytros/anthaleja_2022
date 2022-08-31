@hasCharacter
    <div class="modal fade" id="inventoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="inventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inventoryModalLabel">Inventory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        @forelse (Auth::user()->character->items as $item)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>{{ $item->name }}</span>
                                    <span class="text-end">{{ $item->pivot->quantity }}</span>
                                </div>
                            </li>
                        @empty
                            <h4>Inventory Empty</h4>
                        @endforelse
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endhasCharacter
