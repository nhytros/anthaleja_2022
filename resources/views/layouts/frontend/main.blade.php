<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.common._head')

<body>
    @if (!Request::is('frontier*'))
        @include('layouts.common._nav-top')
    @endif

    <section class="container-fluid">
        <div class="row">
            @include('layouts.common._sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3">
                @if (Request::is('natter/*') || Request::is('d/*'))
                    @include('frontend.natter.partials._topbar')
                @endif
                @include('layouts.common._alerts')
                @yield('content')
            </main>
        </div>
        @include('layouts.frontend.partials._nav-bottom')
    </section>
    @include('layouts.frontend.partials._footer')
    {{-- @include('layouts.frontend.partials._inventory_modal') --}}
</body>

</html>
