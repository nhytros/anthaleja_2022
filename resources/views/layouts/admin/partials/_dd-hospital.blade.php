<div class="btn-group mb-2 px-1">
    <button type="button" class="btn btn-teal dropdown-toggle text-start" data-bs-toggle="dropdown" aria-expanded="false">
        {!! getIcon('fas', 'hospital-symbol') !!} {{ __('Hospital') }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item{{ getActivePage('#') }}" href="">
                {!! getIcon('fas', 'hospital-user') !!} {{ __('Patients') }}
            </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="h6 ps-1 small-caps">{{ __('Accomodations') }}</li>
        <li><a class="dropdown-item{{ getActivePage('#') }}" href="">
                {!! getIcon('fas', 'h-square') !!} {{ __('Wards') }}
            </a>
        </li>
        <li><a class="dropdown-item{{ getActivePage('#') }}" href="">
                {!! getIcon('fas', 'h-square') !!} {{ __('Rooms') }}
            </a>
        </li>
        <li><a class="dropdown-item{{ getActivePage('#') }}" href="">
                {!! getIcon('fas', 'bed') !!} {{ __('Beds') }}
            </a>
        </li>
    </ul>
</div>
