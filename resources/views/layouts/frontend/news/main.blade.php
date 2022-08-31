<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.frontend.partials._head')

<body>
    @include('layouts.frontend.news.partials._nav-top')
    @yield('content')
</body>

</html>
