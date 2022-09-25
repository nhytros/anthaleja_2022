@hasCharacter()
    <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <span class="navbar-brand">{{ auth()->user()->character->getName() }}</span>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropup">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Natter
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('natter.communities') }}">Community List</a>
                            <li><a class="dropdown-item" href="{{ route('natter.community.create') }}">New Community</a>
                            </li>
                            {{-- <li><a class="dropdown-item" href="{{ route('litted.communities') }}">All Communities</a></li> --}}
                            {{-- <li><a class="dropdown-item" href="{{ route('litted.communities', 'my') }}">My Community</a> --}}
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item dropup dropdown-mega position-static">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">Apps</a>
                    <div class="dropdown-menu dropdown-menu-end shadow">
                        <div class="mega-content px-4">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-3 py-4">
                                        <h5>Locations</h5>
                                        <div class="list-group">
                                            <a class="list-group-item" href="#">Job Office</a>
                                            <a class="list-group-item" href="#">Bank</a>
                                            <a class="list-group-item" href="#">Home</a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-3 py-4">
                                        <h5>Lot of Pages</h5>
                                        <p>Lorem ipsum dolo sit achmet muhamed borlan de irtka.
                                    </div>
                                    @IsVendor
                                        <div class="col-12 col-sm-12 col-md-3 py-4">
                                            <h5>{{ auth()->user()->character->shop->name }}</h5>
                                            <div class="list-group">
                                                <a class="list-group-item" href="#">Go to shop</a>
                                                <a class="list-group-item" href="#">Go to website</a>
                                                <a class="list-group-item" href="#">Bank</a>
                                            </div>
                                        </div>
                                    @else
                                        @hasAmount('bank_amount', 500)
                                            <div class="col-12 col-sm-12 col-md-3 py-4">
                                                <h5>Shop</h5>
                                                <div class="list-group">
                                                    <a class="list-group-item btn btn-primary w-100" href="#">Open a
                                                        Shop</a>
                                                </div>
                                            </div>
                                        @endhasAmount
                                    @endIsVendor
                                    <div class="col-12 col-sm-4 col-md-3 py-4">
                                        <h5>Inventory</h5>
                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    @forelse (Auth::user()->character->items as $item)
                                                        <li class="list-group-item">
                                                            <div class="d-flex justify-content-between">
                                                                <span>{{ $item->name }}</span>
                                                                <span class="text-end">{{ $item->pivot->quantity }}</span>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <h4>Inventory Empty</h4>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </nav>
@endhasCharacter
