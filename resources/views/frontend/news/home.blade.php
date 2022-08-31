@extends('layouts.frontend.news.main')

@section('css')
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/news.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="mail/jqBootstrapValidation.min.js"></script> --}}
    {{-- <script src="mail/contact.js"></script> --}}
    {{-- <script src="js/main.js"></script> --}}
@stop

@section('content')
    <div class="container-fluid">
        <!--start code-->
        <div class="row mb-5">
            <div class="col-12 py-4 bg-dark">
                <div class="row">
                    <!--Breaking box-->
                    <div class="col-md-3 col-lg-2 pr-md-0">
                        <div class="p-2 bg-primary text-white text-center breaking-caret"><span
                                class="font-weight-bold">Breaking News</span></div>
                    </div>
                    <!--end breaking box-->
                    <!--Breaking content-->
                    <div class="col-md-9 col-lg-10 pl-md-4 py-2">
                        <div class="breaking-box">
                            <div id="carouselbreaking" class="carousel slide" data-ride="carousel">
                                <!--breaking news-->
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/"><span
                                                    class="position-relative mx-2 badge badge-primary rounded-0">Technology</span></a>
                                            <a class="text-white"
                                                href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Google
                                                Employees Protest Secret Work on Censored Search Engine for China</a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/"><span
                                                    class="position-relative mx-2 badge badge-primary rounded-0">Technology</span></a>
                                            <a class="text-white"
                                                href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Google
                                                Employees Protest Secret Work on Censored Search Engine for China</a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/"><span
                                                    class="position-relative mx-2 badge badge-primary rounded-0">Technology</span></a>
                                            <a class="text-white"
                                                href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Google
                                                Employees Protest Secret Work on Censored Search Engine for China</a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/"><span
                                                    class="position-relative mx-2 badge badge-primary rounded-0">Technology</span></a>
                                            <a class="text-white"
                                                href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Google
                                                Employees Protest Secret Work on Censored Search Engine for China</a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/"><span
                                                    class="position-relative mx-2 badge badge-primary rounded-0">Technology</span></a>
                                            <a class="text-white"
                                                href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Google
                                                Employees Protest Secret Work on Censored Search Engine for China</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end breaking content-->
                </div>
            </div>
        </div>
        <!--end code-->

        <div class="container">
            <div class="row mb-2 text-align-center">
                <div class="col-4 text-start pt-3">
                    <h1 class="gradient-flag">Anthal News</h1>
                </div>
                <div class="col-8">
                    <img src="{{ genImage(700, 70) }}" alt="">
                </div>
            </div>

            <!--Start code-->
            <div class="row">
                <div class="col-12 pb-5">
                    <!--SECTION START-->
                    <section class="row">
                        <!--Start slider news-->
                        <div class="col-12 col-md-6 pb-0 pb-md-3 pt-2 pe-md-1">
                            <div id="featured" class="carousel slide carousel" data-ride="carousel">
                                <!--dots navigate-->
                                <ol class="carousel-indicators top-indicator">
                                    <li data-target="#featured" data-slide-to="0" class="active"></li>
                                    <li data-target="#featured" data-slide-to="1"></li>
                                    <li data-target="#featured" data-slide-to="2"></li>
                                    <li data-target="#featured" data-slide-to="3"></li>
                                </ol>

                                <!--carousel inner-->
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ genImage(540, 460) }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ genImage(540, 460) }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ genImage(540, 460) }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end carousel inner-->
                            </div>
                        </div>
                        <!--End slider news-->

                        <!--Start box news-->
                        <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                            <div class="row">
                                <!--news box-->
                                <div class="col-6 pb-1 pt-0 pr-1">
                                    <div class="card border-0 rounded-0 text-white overflow zoom">
                                        <div class="position-relative">
                                            <!--thumbnail img-->
                                            <div class="ratio_right-cover-2 image-wrapper">
                                                <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <img class="img-fluid" src="{{ genImage(540, 460) }}"
                                                        alt="simple blog template bootstrap">
                                                </a>
                                            </div>
                                            <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                                <!-- category -->
                                                <a class="p-1 badge badge-primary rounded-0"
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Lifestyle</a>

                                                <!--title-->
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <h2 class="h5 text-white my-1">Should you see the Fantastic Beasts
                                                        sequel?
                                                    </h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--news box-->
                                <div class="col-6 pb-1 pl-1 pt-0">
                                    <div class="card border-0 rounded-0 text-white overflow zoom">
                                        <div class="position-relative">
                                            <!--thumbnail img-->
                                            <div class="ratio_right-cover-2 image-wrapper">
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <img class="img-fluid" src="{{ genImage(540, 460) }}"
                                                        alt="bootstrap templates for blog">
                                                </a>
                                            </div>
                                            <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                                <!-- category -->
                                                <a class="p-1 badge badge-primary rounded-0"
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Motocross</a>
                                                <!--title-->
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <h2 class="h5 text-white my-1">Three myths about Florida elections
                                                        recount
                                                    </h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--news box-->
                                <div class="col-6 pb-1 pr-1 pt-1">
                                    <div class="card border-0 rounded-0 text-white overflow zoom">
                                        <div class="position-relative">
                                            <!--thumbnail img-->
                                            <div class="ratio_right-cover-2 image-wrapper">
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <img class="img-fluid" src="{{ genImage(540, 460) }}"
                                                        alt="bootstrap blog wordpress theme">
                                                </a>
                                            </div>
                                            <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                                <!-- category -->
                                                <a class="p-1 badge badge-primary rounded-0"
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Fitness</a>
                                                <!--title-->
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <h2 class="h5 text-white my-1">Finding Empowerment in Two Wheels and a
                                                        Helmet</h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--news box-->
                                <div class="col-6 pb-1 pl-1 pt-1">
                                    <div class="card border-0 rounded-0 text-white overflow zoom">
                                        <div class="position-relative">
                                            <!--thumbnail img-->
                                            <div class="ratio_right-cover-2 image-wrapper">
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <img class="img-fluid" src="{{ genImage(540, 460) }}"
                                                        alt="blog website templates bootstrap">
                                                </a>
                                            </div>
                                            <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                                <!-- category -->
                                                <a class="p-1 badge badge-primary rounded-0"
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Adventure</a>
                                                <!--title-->
                                                <a
                                                    href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                                    <h2 class="h5 text-white my-1">Ditch receipts and four other tips to be
                                                        a
                                                        shopper</h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end news box-->
                            </div>
                        </div>
                        <!--End box news-->
                    </section>
                    <!--END SECTION-->
                </div>
            </div>
            <!--end code-->

        @stop
