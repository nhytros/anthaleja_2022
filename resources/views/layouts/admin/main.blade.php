<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.common._head')

<body>
    @if (!Request::is('frontier*'))
        @include('layouts.common._nav-top')
    @endif

    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin.partials._sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3">
                {{-- <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ $title }}</h1>
                </div> --}}
                @include('layouts.common._alerts')
                @yield('content')
            </main>
        </div>
        @include('layouts.frontend.partials._nav-bottom')
    </div>
    @include('layouts.frontend.partials._footer')
    {{-- @include('layouts.frontend.partials._inventory_modal') --}}
</body>

</html>
