<div class="btn-group mb-2">
    <button type="button" class="btn btn-primary dropdown-toggle text-start" data-bs-toggle="dropdown"
        aria-expanded="false">
        {!! getIcon('fas', 'hospital-symbol') !!} {{ __('Hospital') }}
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item{{ getActivePage('*') }}" href="">
                {!! getIcon('fas', 'hospital-user') !!} {{ __('Patients') }}
            </a>
        </li>
    </ul>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item{{ getActivePage('*') }}" href="">
                {!! getIcon('fas', 'h-square') !!} {{ __('Wards') }}
            </a>
        </li>
    </ul>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item{{ getActivePage('*') }}" href="">
                {!! getIcon('fas', 'h-square') !!} {{ __('Rooms') }}
            </a>
        </li>
    </ul>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item{{ getActivePage('*') }}" href="">
                {!! getIcon('fas', 'bed') !!} {{ __('Beds') }}
            </a>
        </li>
    </ul>
