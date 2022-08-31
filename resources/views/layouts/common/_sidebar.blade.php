<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        @include('layouts.common._clock')

        <ul class="nav flex-column">
            @yield('side-links')
        </ul>
        @yield('side-panels')
    </div>
</nav>
