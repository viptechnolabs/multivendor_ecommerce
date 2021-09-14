@extends('layouts.app')
@section('content')
    @if(Auth::user()->banned == 0)
        <div class="px-15px px-lg-25px">
            <div class="alert alert-danger d-flex align-items-center">
                Your seller account request has <bee></bee>n pending, <b class="ml-1">Please Wait until Admin Can Approve. </b>
            </div>
        </div>
    @endif
    @if(Auth::user()->banned == 1)
        <div class="px-15px px-lg-25px">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="row gutters-10">
                        <div class="col-6">
                            <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                                <div class="px-3 pt-3">
                                    <div class="opacity-50">
                                        <span class="fs-12 d-block">TOTAL</span>
                                        Customer
                                    </div>
                                    <div class="h3 fw-700 mb-3">1</div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                          d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                                <div class="px-3 pt-3">
                                    <div class="opacity-50">
                                        <span class="fs-12 d-block">TOTAL</span>
                                        Order
                                    </div>
                                    <div class="h3 fw-700 mb-3">0</div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                          d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                                <div class="px-3 pt-3">
                                    <div class="opacity-50">
                                        <span class="fs-12 d-block">TOTAL</span>
                                        Product category
                                    </div>
                                    <div class="h3 fw-700 mb-3">3</div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                          d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
                                <div class="px-3 pt-3">
                                    <div class="opacity-50">
                                        <span class="fs-12 d-block">TOTAL</span>
                                        Product brand
                                    </div>
                                    <div class="h3 fw-700 mb-3">2</div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                          d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row gutters-10">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0 fs-14">Products</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="pie-1" class="w-100 chartjs-render-monitor" height="401"
                                            style="display: block; height: 306px; width: 216px;" width="283"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0 fs-14">Sellers</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="pie-2" class="w-100 chartjs-render-monitor" height="401" width="283"
                                            style="display: block; height: 306px; width: 216px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row gutters-10">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0 fs-14">Category wise product sale</h6>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="graph-1" class="w-100 chartjs-render-monitor" height="656" width="661"
                                    style="display: block; height: 500px; width: 504px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0 fs-14">Category wise product stock</h6>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="graph-2" class="w-100 chartjs-render-monitor" height="656" width="661"
                                    style="display: block; height: 500px; width: 504px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Top 12 Products</h6>
                </div>
                <div class="card-body">
                    <div class="aiz-carousel gutters-10 half-outside-arrow slick-initialized slick-slider"
                         data-items="6" data-xl-items="5" data-lg-items="4" data-md-items="3" data-sm-items="2"
                         data-arrows="true">
                        <div class="slick-list draggable">
                            <div class="slick-track"
                                 style="opacity: 1; width: 440px; transform: translate3d(0px, 0px, 0px);">
                                <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                     aria-hidden="false" style="width: 220px;">
                                    <div>
                                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                                            <div
                                                class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                                                <div class="position-relative">
                                                    <a href="http://127.0.0.1/Demo/product/qweqwe-sKqhe" class="d-block"
                                                       tabindex="0">
                                                        <img class="img-fit mx-auto h-210px ls-is-cached lazyloaded"
                                                             src="http://127.0.0.1/Demo/public/assets/img/placeholder.jpg"
                                                             data-src="" alt="qweqwe"
                                                             onerror="this.onerror=null;this.src='http://127.0.0.1/Demo/public/assets/img/placeholder.jpg';">
                                                    </a>
                                                </div>
                                                <div class="p-md-3 p-2 text-left">
                                                    <div class="fs-15">
                                                        <del class="fw-600 opacity-50 mr-1">Rs1,555.00</del>
                                                        <span class="fw-700 text-primary">Rs1,545.00</span>
                                                    </div>
                                                    <div class="rating rating-sm mt-1">
                                                        <i class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i>
                                                    </div>
                                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                                        <a href="http://127.0.0.1/Demo/product/qweqwe-sKqhe"
                                                           class="d-block text-reset" tabindex="0">qweqwe</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                                     style="width: 220px;">
                                    <div>
                                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                                            <div
                                                class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                                                <div class="position-relative">
                                                    <a href="http://127.0.0.1/Demo/product/test-UKwtq" class="d-block"
                                                       tabindex="0">
                                                        <img class="img-fit mx-auto h-210px ls-is-cached lazyloaded"
                                                             src="http://127.0.0.1/Demo/public/assets/img/placeholder.jpg"
                                                             data-src="" alt="test"
                                                             onerror="this.onerror=null;this.src='http://127.0.0.1/Demo/public/assets/img/placeholder.jpg';">
                                                    </a>
                                                </div>
                                                <div class="p-md-3 p-2 text-left">
                                                    <div class="fs-15">
                                                        <span class="fw-700 text-primary">Rs0.00</span>
                                                    </div>
                                                    <div class="rating rating-sm mt-1">
                                                        <i class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i>
                                                    </div>
                                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                                        <a href="http://127.0.0.1/Demo/product/test-UKwtq"
                                                           class="d-block text-reset" tabindex="0">test</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
