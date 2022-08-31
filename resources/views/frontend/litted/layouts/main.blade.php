<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.frontend.partials._head')

<body>
    @include('layouts.frontend.partials._nav-top')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.common._sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3">
                @include('layouts.common._alerts')
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            @yield('content')
                        </div>
                        <div class="col-3">
                            @include('frontend.litted.layouts.partials._sidebar-right')
                        </div>
                    </div>
                </div>
            </main>
        </div>
        @include('layouts.frontend.partials._nav-bottom')
    </div>
    @include('layouts.frontend.partials._footer')
</body>

</html>
