@include('pages.common.header')
        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Our Partners</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Partners</li>
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
        <!-- Start Brand Area  -->
        <div class="edu-brand-area brand-area-1 gap-top-equal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="brand-section-heading">
                            <div class="section-title section-left" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                {{-- <span class="pre-title">Our Partners</span> --}}
                                <h2 class="title">Our Partners</h2>
                                <span class="shape-line"><i class="icon-19"></i></span>
                                {{-- <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod tempor incididunt.</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="brand-grid-wrap">
                            @foreach ($view_partners as $view_partner)
                                {{-- <h4>{{ $view_partner->name }}</h4> --}}
                                <div class="brand-grid">
                                    <a href="{{ $view_partner->partner_url }}">
                                        <img style="width: 100%; height: 100px;" src="{{ URL::asset("/public/../$view_partner->images")}}" alt="Brand Logo">
                                    </a>
                                </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area  -->
        <!--=        Footer Area Start          =-->
        <!--=====================================-->
        @include('pages.common.footer')
