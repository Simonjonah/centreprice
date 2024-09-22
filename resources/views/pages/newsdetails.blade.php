    @include('pages.common.header')

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Blog Details</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{  url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
        <!--=       Blog Details Area Start     =-->
        <!--=====================================-->
        <div class="blog-details-area section-gap-equal">
            <div class="container">
                <div class="row row--30">
                    <div class="col-lg-8">
                        <div class="blog-details-content">
                            <div class="entry-content">
                                {{-- <span class="category">Developer</span> --}}
                                <h3 class="title">{{ $view_singleblog->title }}</h3>
                                <ul class="blog-meta">
                                    <li><i class="icon-27"></i>{{ $view_singleblog->created_at->format('D m, Y') }}Oct 10, 2021</li>
                                </ul>
                                <div class="thumbnail">
                                    <img src="{{ URL::asset("/public/../$view_singleblog->images")}}" alt="Blog Image">
                                </div>
                            </div>
                            <p>{!! $view_singleblog->body !!}</p>
                            
                           
                            
                            
                            <div class="blog-share-area">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="blog-share">
                                            <h6 class="title">Share on:</h6>
                                            <ul class="social-share icon-transparent">
                                                <li>
                                                    <a href="#"><i class="icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                       
                    
                    </div>
                    <div class="col-lg-4">
                        <div class="edu-blog-sidebar">
                            
                            <div class="edu-blog-widget widget-latest-post">
                                <div class="inner">
                                    <h4 class="widget-title">Latest News</h4>
                                    <div class="content latest-post-list">
                                        @foreach ($view_allblogs as $view_allblog)
                                            @if ($view_allblog->status == 'approved')
                                            <div class="latest-post">
                                                <div class="thumbnail">
                                                    <a href="{{ url('news/newsdetails/'.$view_allblog->slug) }}">
                                                        <img src="{{ URL::asset("/public/../$view_allblog->images")}}" alt="Blog Images">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h6 class="title"><a href="{{ url('news/newsdetails/'.$view_allblog->slug) }}">{{ $view_allblog->title }}</a></h6>
                                                    <ul class="blog-meta">
                                                        <li><i class="icon-27"></i>{{ $view_allblog->created_at->format('d M, Y') }}</li>
                                                    </ul>
                                                </div>
                                            </div>  
                                            @else
                                                
                                            @endif
                                        @endforeach
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Widget  -->
                           
                            <!-- Start Single Widget  -->
                            <div class="edu-blog-widget widget-categories">
                                <div class="inner">
                                    <h4 class="widget-title">Archives</h4>
                                    <div class="content">
                                        <ul class="category-list">
                                            @foreach ($archives as $archive)
                                            <li><a href="#">{{ $archive->created_at }} <span>(3)</span></a></li>
                                                
                                            @endforeach
                                            {{-- <li><a href="#">2017 Nevember <span>(3)</span></a></li>
                                            <li><a href="#">2018 December <span>(7)</span></a></li>
                                            <li><a href="#">2019 January<span>(2)</span></a></li>
                                            <li><a href="#">2020 February <span>(1)</span></a></li>
                                            <li><a href="#">2021 March <span>(3)</span></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================-->
        <!--=        CTA  Area Start            =-->
        <!--=====================================-->
       
        <!--=        Footer Area Start       	=-->
        <!--=====================================-->
        @include('pages.common.footer')
