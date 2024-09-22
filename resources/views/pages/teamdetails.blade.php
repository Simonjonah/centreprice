@include('pages.common.header')

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Team Details</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Team Details</li>
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
        <!--=        Team Area Start            =-->
        <!--=====================================-->
        <div class="edu-team-details-area section-gap-equal">
            <div class="container">
                <div class="row row--40">
                    <div class="col-lg-4">
                        <div class="team-details-thumb">
                            <div class="thumbnail">
                                <img src="{{ URL::asset("/public/../$view_teamdetails->images")}}" alt="team">
                            </div>
                            <ul class="social-share">
                                <li><a href="{{ $view_teamdetails->facebook }}"><i class="icon-facebook"></i></a></li>
                                <li><a href="{{ $view_teamdetails->twitter }}"><i class="icon-twitter"></i></a></li>
                                <li><a href="{{ $view_teamdetails->linkedin }}"><i class="icon-linkedin2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="team-details-content">
                            <div class="main-info">
                                <span class="subtitle">Team</span>
                                <h3 class="title">{{ $view_teamdetails->fname }} {{ $view_teamdetails->lname }}</h3>
                                <span class="designation">{{ $view_teamdetails->position }}</span>
                              
                            </div>
                            <div class="bio-describe">
                                <h4 class="title">About Me</h4>
                                <p>{!! $view_teamdetails->body !!}</p>
                            </div>
                            {{-- <div class="contact-info">
                                <h4 class="title">Contact Me</h4>
                                <ul>
                                    <li><span>Address:</span>North Helenavile, FV77 8WS</li>
                                    <li><span>Email:</span><a href="mailto:edublink@example.com" target="_blank">edublink@example.com</a></li>
                                    <li><span>Phone:</span><a href="tel:+37(417)683-4409">+37 (417) 683-4409</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================-->
        <!--=        Courses Area Start         =-->
               <!--=====================================-->
        @include('pages.common.footer')
