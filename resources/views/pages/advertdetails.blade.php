    @include('pages.common.header')
        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area breadcrumb-style-4">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <span class="pre-title">{{ $view_advertsdetails->company_name }}</span>
                        <h1 class="title">{{ $view_advertsdetails->title }}</h1>
                    </div>
                    <ul class="course-meta">
                        <li><i class="icon-27"></i>{{ $view_advertsdetails->event_date }}</li>
                        <li><i class="icon-33"></i>{{ $view_advertsdetails->created_at->format('h:i:a') }} </li>
                        <li><i class="icon-40"></i>{{ $view_advertsdetails->address }}</li>
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
        <!--=        Event Area Start         =-->
        <!--=====================================-->
        <section class="event-details-area edu-section-gap">
            <div class="container">
                <div class="event-details">
                    <div class="main-thumbnail">
                        <img style="width: 1170px; height: 420px;" src="{{ URL::asset("/public/../$view_advertsdetails->images1")}}" alt="Event">
                    </div>
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="details-content">
                                <h3>About the Adverts</h3>
                                <p>{!! $view_advertsdetails->body !!}</p>
                            </div>

                            <div class="features-image">
                                <div class="row g-md-5">
                                    <div class="col-6">
                                        <div class="thumb">
                                            <img style="width: 360px; height: 270px;" src="{{ URL::asset("/public/../$view_advertsdetails->images2")}}" alt="Features Images">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="thumb">
                                            <img style="width: 360px; height: 270px;" src="{{ URL::asset("/public/../$view_advertsdetails->images3")}}" alt="Features Images">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="thumb">
                                            <img style="width: 360px; height: 270px;" src="{{ URL::asset("/public/../$view_advertsdetails->images4")}}" alt="Features Images">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="thumb">
                                            <img style="width: 360px; height: 270px;" src="{{ URL::asset("/public/../$view_advertsdetails->images5")}}" alt="Features Images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-author">
                                <div class="author-content">
                                    {{-- <p>Enim ad minim veniam quis nostrud exercitation lamco laboris nisi ex commodo consequat aute irure.</p> --}}
                                    <ul class="social-share icon-transparent">
                                        <li>
                                            <a href="{{ $view_advertsdetails->facebook }}"><i class="icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $view_advertsdetails->twitter }}"><i class="icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $view_advertsdetails->instagram }}"><i class="icon-instagram"></i></a>
                                        </li>

                                        <li>
                                            <a href="{{ $view_advertsdetails->linkedin }}"><i class="icon-linkedin2"></i></a>
                                        </li>

                                        <li>
                                            <a href="{{ $view_advertsdetails->whatsapp }}"><i class="icon-whatsapp"></i>Whatsapp</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                        </div>
                        <div class="col-lg-4">
                            <div class="course-sidebar-3">
                                <div class="edu-course-widget widget-course-summery">
                                    <div class="inner">
                                        <div class="content">
                                            <h4 class="widget-title">Adverts Info</h4>
                                            <ul class="course-item">
                                                {{-- <li>
                                                    <span class="label"><i class="icon-60"></i>Cost:</span>
                                                    <span class="value price">$70.00</span>
                                                </li> --}}
                                                <li>
                                                    <span class="label"><i class="icon-69"></i>Email:</span>
                                                    <span class="value">{{ $view_advertsdetails->email }}</span>
                                                </li>
                                                <li>
                                                    <span class="label"><i class="icon-5"></i>Phone:</span>
                                                    <span class="value">{{ $view_advertsdetails->phone }}</span>
                                                </li>

                                                <li>
                                                    <span class="label"><i class="icon-6"></i>Address:</span>
                                                    <span class="value">{{ $view_advertsdetails->address }}</span>
                                                </li>

                                                
                                            </ul>
                                            {{-- <div class="read-more-btn">
                                                <a href="#" class="edu-btn">Book Now <i class="icon-4"></i></a>
                                            </div> --}}
                                            {{-- <div class="countdown"></div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!--=====================================-->
        <!--=        Footer Area Start          =-->
        <!--=====================================-->
        @include('pages.common.footer')
