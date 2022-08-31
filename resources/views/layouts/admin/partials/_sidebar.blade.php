<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-5 pt-1">
    <div class="position-sticky sidebar-sticky">
        @include('layouts.common._clock')
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ Route::currentRouteName('admin.dashboard') ? ' active' : '' }}" aria-current="page"
                    href="{{ route('admin.dashboard') }}">
                    <span class="align-text-bottom">
                        <x-fas-cloud /> {{ trans('admin.dashboard') }}
                    </span>
                </a>
            </li>
            <a class="nav-link" href="{{ route('admin.users') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                <x-fas-users /> {{ trans('admin.users.manage') }}
            </a>
            <a class="nav-link" href="{{ route('admin.roles') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                <x-fas-user-tag /> {{ trans('admin.roles.manage') }}
            </a>
            <a class="nav-link" href="{{ route('admin.permissions') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                <x-fas-user-cog /> {{ trans('admin.permissions.manage') }}
            </a>


            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    (function() {
        setInterval(function() {
            axios.get('layouts.common._clock', )
                .then(function(response) {
                    document.querySelector('#clock')
                        .innerHtml(response.data);
                }); // do nothing for error - leaving old content.
        });
    }, 1000); // milliseconds
</script>
