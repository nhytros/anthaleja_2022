<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler px-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample1"
            aria-controls="navbarExample1" aria-expanded="false" aria-label="Toggle navigation">
            {!! getIcon('fas', 'bars') !!}
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarExample1">
            <!-- Left links -->
            <ul class="navbar-nav ms-auto ps-lg-0" style="padding-left: 0.15rem">
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
                <li class="nav-item">
                    <a class="nav-link" href="#">link</a>
                </li>
                <!-- Navbar dropdown -->
                <li class="nav-item dropdown position-static">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {!! getIcon('fas', 'bars') !!}
                    </a>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu mt-0 dropdown-menu-end" aria-labelledby="navbarDropdown"
                        style="
                          border-top-left-radius: 0;
                          border-top-right-radius: 0;
                        ">
                        <div class="container">
                            <div class="row my-4">
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="list-group list-group-flush fa-2x">
                                        <a href="" class="list-group-item list-group-item-action">
                                            {!! getIcon('fas','money-check') !!}
                                        </a>
                                        <a href="" class="list-group-item list-group-item-action">
                                            {!! getIcon('fas','hamburger') !!}
                                        </a>
                                        <a href="" class="list-group-item list-group-item-action">
                                            {!! getIcon('fas','hamburger') !!}
                                        </a>
                                        <a href="" class="list-group-item list-group-item-action">
                                            {!! getIcon('fas','hamburger') !!}
                                        </a>
                                        <a href="" class="list-group-item list-group-item-action">
                                            {!! getIcon('fas','hamburger') !!}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="list-group list-group-flush">
                                        <a href="" class="list-group-item list-group-item-action">Explicabo
                                            voluptas</a>
                                        <a href="" class="list-group-item list-group-item-action">Perspiciatis
                                            quo</a>
                                        <a href="" class="list-group-item list-group-item-action">Cras justo
                                            odio</a>
                                        <a href="" class="list-group-item list-group-item-action">Laudantium
                                            maiores</a>
                                        <a href="" class="list-group-item list-group-item-action">Provident
                                            dolor</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                                    <div class="list-group list-group-flush">
                                        <a href="" class="list-group-item list-group-item-action">Iste
                                            quaerato</a>
                                        <a href="" class="list-group-item list-group-item-action">Cras justo
                                            odio</a>
                                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="list-group list-group-flush">
                                        <a href="" class="list-group-item list-group-item-action">Cras justo
                                            odio</a>
                                        <a href="" class="list-group-item list-group-item-action">Saepe</a>
                                        <a href="" class="list-group-item list-group-item-action">Vel alias</a>
                                        <a href="" class="list-group-item list-group-item-action">Sunt
                                            doloribus</a>
                                        <a href="" class="list-group-item list-group-item-action">Cum dolores</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>


<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white p-0">
        <a class="navbar-brand mr-4" href="#"><strong>BBBootstrap</strong></a>

        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Products<span class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-shopping-cart"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">WearCMS</h6>
                                                <small class="text-muted">For your project</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-gamepad"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Game+</h6>
                                                <small class="text-muted">Monetization of games</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-video-camera"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Streetcam</h6>
                                                <small class="text-muted">Keep track all year</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-comment"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Teamne</h6>
                                                <small class="text-muted">Teamwork</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-briefcase"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Prospec</h6>
                                                <small class="text-muted">Solutions for your business</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-bolt"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Booster</h6>
                                                <small class="text-muted">Increase engagement</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Resources<span
                            class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu2" aria-labelledby="navbarDropdown2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-folder"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">WhitePaper</h6>
                                                <small class="text-muted">Marketing and report</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-question"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">FAQs</h6>
                                                <small class="text-muted">Qs and answers</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-calculator"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Tools</h6>
                                                <small class="text-muted">All tools</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Success Stories</h6>
                                                <small class="text-muted">Experiences</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Customers<span
                            class="fa fa-angle-down"></span></a>
                    <div class="dropdown-menu" id="dropdown-menu3" aria-labelledby="navbarDropdown3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-feed"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">Feedback</h6>
                                                <small class="text-muted">Opinions, complaints</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row d-flex tab">
                                        <div class="fa-icon text-center">
                                            <span class="fa fa-question"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="dropdown-item" href="#">
                                                <h6 class="mb-0">FAQs</h6>
                                                <small class="text-muted">Qs and answers</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
