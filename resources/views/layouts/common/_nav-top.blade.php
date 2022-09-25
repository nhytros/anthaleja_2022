<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Anthaleja <small
                class="text-muted fs-6">v{{ config('ath.version') }}<small></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="hamburger-toggle">
                <div class="hamburger"><span></span><span></span><span></span></div>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                @auth
                    @include('layouts.common._user-menu')
                @endauth
            </ul>
        </div>
    </div>
</nav>
