<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AnthalWIKI </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="hamburger-toggle">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('wiki.list', true) }}">My pages</a></li>
                <li class="nav-item"><a class="nav-link" href="#">My changes</a></li>
                @hasCharacter()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {!! gravatar(auth()->user()->character->username, 24) !!}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('frontier.logout') }}">{{ trans('frontier.leave_city') }}</a></li>
                        </ul>
                    </li>
                @endhasCharacter
                <li class="nav-item"><a class="nav-link" href="#">
                        {!! getIcon('fas', 'question-circle') !!}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
