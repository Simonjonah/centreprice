@include('pages.common.header')
        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Blog</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
        <!--=        Blog Area Start            =-->
        <!--=====================================-->
         <!-- Start Event Area  -->
         <div class="edu-event-area event-area-2" style="background-color: #f0f4f5;">
            <div class="container edublink-animated-shape">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    {{-- <span class="pre-title">Events & News</span> --}}
                    <h2 class="title">Events & News</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    @foreach ($view_blogs as $view_blog)
                        @if ($view_blog->status == 'approved')
                             <!-- Start Event Grid  -->
                            <div class="col-lg-4 col-md-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                                <div class="edu-event event-style-1">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="{{ url('news/newsdetails/'.$view_blog->slug) }}">
                                                <img src="{{ URL::asset("/public/../$view_blog->images")}}" alt="Blog Images">
                                            </a>
                                            <div class="event-time">
                                                <span><i class="icon-33"></i>{{ $view_blog->created_at->format('d M, Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="{{ url('news/newsdetails/'.$view_blog->slug) }}">{{ $view_blog->title }}</a></h5>
                                            <p>{{ \Illuminate\Support\Str::limit($view_blog->body, 150) }}</p>
                                            
                                            <div class="read-more-btn">
                                                <a class="edu-btn btn-small btn-secondary" href="{{ url('news/newsdetails/'.$view_blog->slug) }}">Learn More <i class="icon-4"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Event Grid  -->

                        @else
                            
                        @endif
                    @endforeach
                   
                </div>

                <ul class="shape-group">
                    <li class="shape-1" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                        <img class="rotateit" src="{{ asset('front/assets/images/about/shape-13.png') }}" alt="Shape">
                    </li>
                    <li class="shape-2 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                        <span data-depth=".9"></span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Event Area  -->

        @include('pages.common.footer')