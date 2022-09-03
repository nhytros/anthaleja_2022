<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-5 pt-1">
    <div class="position-sticky sidebar-sticky">
        @include('layouts.common._clock')
        <div class="nav flex-column">
            <a class="nav-link{{ getActivePage('admin/dashboard*') }}" href="{{ route('admin.dashboard') }}">
                {!! getIcon('fas', 'cloud') !!} {{ trans('admin.dashboard') }}
            </a>
            <a class="nav-link{{ getActivePage('admin/user*') }}" href="{{ route('admin.users') }}">
                {!! getIcon('fas', 'users') !!} {{ trans('admin.users.manage') }}
            </a>
            <a class="nav-link{{ getActivePage('admin/role*') }}" href="{{ route('admin.roles') }}">
                {!! getIcon('fas', 'user-tag') !!} {{ trans('admin.roles.manage') }}
            </a>
            <a class="nav-link{{ getActivePage('admin/permission*') }}" href="{{ route('admin.permissions') }}">
                {!! getIcon('fas', 'user-cog') !!} {{ trans('admin.permissions.manage') }}
            </a>
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                {!! getIcon('fas', 'school') !!}<span>{{ __('School') }}</span>
            </h6>
            <a class="nav-link{{ getActivePage('admin/school/course*') }}" href="{{ route('admin.school.courses') }}">
                {!! getIcon('fas', 'book') !!} {{ __('Courses') }}
            </a>
            <a class="nav-link{{ getActivePage('admin/school/teacher*') }}"
                href="{{ route('admin.school.teachers') }}">
                {!! getIcon('fas', 'chalkboard-teacher') !!} {{ __('Teachers') }}
            </a>
            <a class="nav-link{{ getActivePage('admin/school/student*') }}"
                href="{{ route('admin.school.students') }}">
                {!! getIcon('fas', 'users-class') !!} {{ __('Students') }}
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
        </div>

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
