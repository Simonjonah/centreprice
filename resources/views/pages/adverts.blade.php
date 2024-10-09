@include('pages.common.header')
        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Advertisement</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Advertisement</li>
                    </ul>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1">
                    <span></span>
                </li>
                <li class="shape-2 scene"><img data-depth="2" src="{{ asset('front/assets/images/about/shape-13.png') }}" alt="shape"></li>
                <li class="shape-3 scene"><img data-depth="-2" src="{{ asset('front/assets/images/about/shape-15.png') }}" alt="shape"></li>
                <li class="shape-4">
                    <span></span>
                </li>
                <li class="shape-5 scene"><img data-depth="2" src="{{ asset('front/assets/images/about/shape-07.png') }}" alt="shape"></li>
            </ul>
        </div>

        <!--=====================================-->
        <!--=           Shop Area Start         =-->
        <!--=====================================-->
        <section class="shop-page-area section-gap-equal">
            <div class="container">
                <div class="edu-sorting-area">
                    <div class="sorting-left">
                        <h6 class="showing-text">We found <span>{{ $count_advert }}</span> Adverts available for you</h6>
                    </div>
                    <div class="sorting-right">
                        <div class="edu-sorting">
                            <div class="icon"><i class="icon-55"></i></div>
                            {{-- <select class="edu-select">
                                <option>Filters</option>
                                <option>Low To High</option>
                                <option>High Low To</option>
                                <option>Last Viewed</option>
                            </select> --}}
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    @foreach ($view_adverts as $view_advert)
                        @if ($view_advert->status == 'approved')
                        <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-product">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}">
                                            <img style="width: 270px; height: 320px;" src="{{ URL::asset("/public/../$view_advert->images1")}}" alt="Shop Images">
                                        </a>
                                        <div class="product-hover-info">
                                            <ul>
                                                {{-- <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li> --}}
                                                <li><a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}"><i class="icon-76"></i></a></li>
                                                {{-- <li><a href="{{ url('register') }}"><i class="icon-3"></i></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}">{{ $view_advert->company_name }}</a></h6>
                                        
                                        <div class="price"><a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}">{{ $view_advert->title }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        @else
                        @endif
                    @endforeach
                    

                </div>


                {{-- <ul class="edu-pagination pt--50">
                    <li><a href="#" aria-label="Previous"><i class="icon-west"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="more-next"><a href="#"></a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#" aria-label="Next"><i class="icon-east"></i></a></li>
                </ul> --}}

            </div>
        </section>
        <!--=====================================-->
        <!--=        Footer Area Start          =-->
        <!--=====================================-->
        @include('pages.common.footer')
