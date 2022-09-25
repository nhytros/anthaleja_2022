@extends('layouts.frontend.main')
@section('content')
    <div class="container-fluid mt-2 mb-3">
        <div class="card">
            <h4 class="card-header">
                @if ($channel){{ $channel->name }}@endif
            </h4>
            <div class="row mt-2">
                <div class="col-md-3 bg-white">

                    <!-- =============================================================== -->
                    <!-- member list -->
                    <ul class="friend-list">
                        <li class="active bounceInDown">
                            <a href="#" class="clearfix">
                                @if ($channel)
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                    <div class="friend-name">
                                        <strong>John Doe</strong>
                                    </div>
                                    <div class="last-message text-muted">Hello, Are you there?</div>
                                    <small class="time text-muted">Just now</small>
                                    <small class="chat-alert label label-danger">1</small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Jane Doe</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">5 mins ago</small>
                                <small class="chat-alert text-muted"><i class="fa fa-check"></i></small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Kate</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">Yesterday</small>
                                <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Kate</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">Yesterday</small>
                                <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Kate</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">Yesterday</small>
                                <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_6.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Kate</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">Yesterday</small>
                                <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_5.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Kate</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">Yesterday</small>
                                <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                <div class="friend-name">
                                    <strong>Jane Doe</strong>
                                </div>
                                <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                                <small class="time text-muted">5 mins ago</small>
                                <small class="chat-alert text-muted"><i class="fa fa-check"></i></small>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--=========================================================-->
                <!-- selected chat -->
                <div class="col-md-6 bg-white">
                    <form action="" method="post" enctype="multipart/form-data">@csrf
                        <textarea name="body" id="body" class="form-control mb-1" rows=3
                            placeholder="{{ trans('litted.community.post.body') }}">{{ old('body') }}</textarea>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-post-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-post" type="button" role="tab" aria-controls="nav-post"
                                    aria-selected="true">{!! getIcon('fas', 'comment') !!}</button>
                                <button class="nav-link" id="nav-image-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-image" type="button" role="tab" aria-controls="nav-image"
                                    aria-selected="false">{!! getIcon('fas', 'image') !!}</button>
                                <button class="nav-link" id="nav-video-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-video" type="button" role="tab" aria-controls="nav-video"
                                    aria-selected="false">{!! getIcon('fas', 'video') !!}</button>
                            </div>
                        </nav>

                        <div class="d-flex justify-content-between mt-1">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane show active" id="nav-post" role="tabpanel"
                                    aria-labelledby="nav-post-tab" tabindex="0"></div>
                                <div class="tab-pane" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab"
                                    tabindex="0"><input type="file" name="image" id="image"
                                        accept="image/*"></div>
                                <div class="tab-pane" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab"
                                    tabindex="0"><input type="file" name="video" id="video"
                                        accept="video/*"></div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="{{ __('Send') }}">
                        </div>
                    </form>
                    <hr>
                    <div class="chat-message">
                        <ul class="chat">
                            <li class="left clearfix">
                                <span class="chat-img pull-start">
                                    <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">John Doe</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img text-end">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Sarah</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                        dolor, quis ullamcorper ligula sodales at.
                                    </p>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <span class="chat-img pull-start">
                                    <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">John Doe</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img text-end">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Sarah</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                        dolor, quis ullamcorper ligula sodales at.
                                    </p>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <span class="chat-img pull-start">
                                    <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">John Doe</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img text-end">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Sarah</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                        dolor, quis ullamcorper ligula sodales at.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img text-end">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Sarah</strong>
                                        <small class="text-end text-muted"><i class="fa fa-clock-o"></i> 13 mins
                                            ago</small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                        dolor, quis ullamcorper ligula sodales at.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-box bg-white">
                        <div class="input-group">
                            <input class="form-control border no-shadow no-rounded" placeholder="Type your message here">
                            <span class="input-group-btn">
                                <button class="btn btn-success no-rounded" type="button">Send</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
