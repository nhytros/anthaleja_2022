@extends('layouts.frontend.main')
@section('content')
    <div class="container-fluid mt-2 mb-3">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-create_post" role="tabpanel" aria-labelledby="nav-create_post-tab"
                            tabindex="0">
                            @include('frontend.natter.post_create')
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-3"></div>
        </div>

    </div>
@endsection
