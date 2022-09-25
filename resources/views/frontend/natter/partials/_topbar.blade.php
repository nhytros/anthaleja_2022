<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/natter">Natter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {!! gravatar($community->name . $community->created_at, 18) !!}
                        d/{{ $community->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">{!! gravatar($community->name . $community->created_at, 18) !!} d/{{ $community->name }}</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul>
            <div class="nav ms-auto mb-2 mb-lg-0" role="tablist">
                <span class="nav-link" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular"
                    type="button" aria-controls="nav-popular" aria-selected="true">{!! getIcon('fas', 'chart-line') !!}</span>
                <span class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button"
                    aria-controls="nav-all" aria-selected="true">{!! getIcon('fas', 'chart-line') !!}</span>
                <span class="nav-link" id="nav-live-tab" data-bs-toggle="tab" data-bs-target="#nav-live" type="button"
                    aria-controls="nav-live" aria-selected="true">{!! getIcon('fas', 'chart-line') !!}</span>
                <span class="nav-link" id="nav-chat-tab" data-bs-toggle="tab" data-bs-target="#nav-chat" type="button"
                    aria-controls="nav-chat" aria-selected="true">{!! getIcon('fas', 'chart-line') !!}</span>
                <span class="nav-link" id="nav-notifications-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-notifications" type="button" aria-controls="nav-notifications"
                    aria-selected="true">{!! getIcon('fas', 'bell') !!}</span>
                <span class="nav-link" id="nav-create_post-tab" data-bs-toggle="tab" data-bs-target="#nav-create_post"
                    type="button" aria-controls="nav-create_post" aria-selected="true">{!! getIcon('fas', 'plus text-success') !!}</span>
            </div>
        </div>
    </div>
</nav>
