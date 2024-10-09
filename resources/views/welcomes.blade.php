        @include('pages.common.header')
        <!--=====================================-->
        <!--=       Hero Banner Area Start      =-->
        <!--=====================================-->
        <div class="hero-banner hero-style-4 bg-image">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">

                            <div class="testimonial-area-5 gap-lg-bottom-equal" style="margin-top: 20px; margin-bottom: -100px;">
                                <div class="container">
                                    <div class="row g-lg-5">
                                        <div class="col-lg-4">
                                            
                                        </div>
                                        <div class="col-lg-offset-4 col-lg-4">
                                            <div class="swiper-testimonial-slider-wrapper swiper testimonial-coverflow">
                                                <div class="swiper-wrapper">
                                                    @foreach ($view_adverts as $view_advert)
                                                    @if ($view_advert->status == 'approved')
                                                    <div class="swiper-slide">
                                                        <div class="testimonial-grid">
                                                            <div class="thumbnailr">
                                                                <a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}"><img style="width: 100%;" src="{{ URL::asset("/public/../$view_advert->images1")}}" alt="Testimonial"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h5 class="title"><a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}">{{ $view_advert->company_name }}</a></h5>
                                                                <span class="subtitle"><a href="{{ url('adverts/advertdetails/'.$view_advert->slug) }}">{{ $view_advert->title }}</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                                    
                                                    @endif
                                                @endforeach
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
      

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="banner-content">

                        </div>
                        
                            <div class="row">
                                @foreach ($view_roots as $view_root)
                                <div class="col" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                                    <div class="categorie-grid categorie-style-3 color-primary-style">
                                        <div class="icon">
                                            @if ($view_root->images == null)
                                            <i class="icon-9"></i>
                                            @else
                                            <img style="width: 50%; height: 50%;" src="{{ URL::asset("/public/../$view_root->images")}}" alt="">
                                                
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a href="{{ url('viewrootproducts/'.$view_root->id) }}">
                                                <h5 class="title">{{ $view_root->rootname }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                               
                                <div style="margin-top: 60px;" class="banner-btn" data-sal-delay="400" data-sal="slide-up" data-sal-duration="1000">
                                <a href="{{ url('register') }}" class="edu-btn">Join Our Community <i class="icon-4"></i></a>
                            </div>
                                 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-gallery">
                
            </div>
            <div class="scroll-down-btn">
                <a class="scroll-btn" href="#categories"><i class="icon-41"></i></a>
            </div>
            <ul class="shape-group">
                <li class="shape-1 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="2" src="{{ asset('front/assets/images/others/shape-17.png') }}" alt="Shape">
                </li>
                <li class="shape-2 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="-2" src="{{ asset('front/assets/images/banner/shape-03.png') }}" alt="Shape">
                </li>
                <li class="shape-3 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="2" src="{{ asset('front/assets/images/faq/shape-09.png') }}" alt="Shape">
                </li>
                <li class="shape-4 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="-2" src="{{ asset('front/assets/images/others/shape-15.png') }}" alt="Shape">
                </li>
                <li class="shape-5 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="-2" src="{{ asset('front/assets/images/others/shape-16.png') }}" alt="Shape">
                </li>
                <li class="shape-6 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="2" src="{{ asset('front/assets/images/faq/shape-12.png') }}" alt="Shape">
                </li>
                <li class="shape-7 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <img data-depth="-2" src="{{ asset('assets/images/others/shape-17.png') }}" alt="Shape">
                </li>
                <li class="shape-8 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                    <span></span>
                </li>
            </ul>
        </div>

        <!--=====================================-->
        <!--=       Category Area Start      	=-->
        <!--=====================================-->
        <!-- Start Categories Area  -->
        <div class="edu-categorie-area categorie-area-3 edu-section-gap bg-image" id="categories">
            <div class="container">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title pre-textsecondary">Product Categories</span>
                    {{-- <h2 class="title">Online <span class="color-primary">Classes</span> For Remote Learning.</h2> --}}
                    <span class="shape-line"><i class="icon-19"></i></span>
                    {{-- <p>Consectetur adipiscing elit sed do eiusmod tempor.</p> --}}
                </div>
                
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
                    @foreach ($view_rootscates as $view_rootscate)
                    <div class="col" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-primary-style">
                            <div class="icon">
                                @if ($view_rootscate->images == null)
                                <i class="icon-9"></i>
                                @else
                                <img style="width: 50%; height: 50%;" src="{{ URL::asset("/public/../$view_rootscate->images")}}" alt="">
                                    
                                @endif
                            </div>
                            <div class="content">
                                <a href="{{ url('viewrootproducts/'.$view_rootscate->id) }}">
                                    <h5 class="title">{{ $view_rootscate->rootname }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    {{--  --}}
                    
                </div>
            </div>
        </div>
        <!-- End Categories Area  -->
        <!--=====================================-->
        <!--=       Course Area Start      		=-->
        <!--=====================================-->
        <!-- Start Course Area  -->

        
        <div class="gap-bottom-equal edu-about-area about-style-2">
            <div class="container edublink-animated-shape">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-image-gallery">
                            <img class="main-img-1" src="{{ asset('front/assets/images/about/ab.jpg') }}" alt="About Image">
                            <div class="author-box" data-parallax='{"x": 0, "y": -120}'>
                                <div class="inner">
                                    <div class="thumb">
                                        <img src="{{ asset('front/assets/images/about/shape-03.png') }}" alt="Shape Image">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="award-status bounce-slide">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="icon-30"></i>
                                    </div>
                                    <div class="content">
                                        <h6 class="title">20K+</h6>
                                        <span class="subtitle">Enrolled Members</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="shape-group">
                                <li class="shape-1 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                    <img data-depth="2" src="{{ asset('front/assets/images/about/shape-38.png') }}" alt="Shape">
                                </li>
                                <li class="shape-2 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                    <img data-depth="-2" src="{{ asset('front/assets/images/about/shape-37.png') }}" alt="Shape">
                                </li>
                                <li class="shape-3 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                    <img data-depth="1.8" src="{{ asset('front/assets/images/about/shape-04.png') }}" alt="Shape">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title section-left" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <span class="pre-title">About Us</span>
                                <h2 class="title">ABOUT <span class="color-secondary"> US</span> </h2>
                                <span class="shape-line"><i class="icon-19"></i></span>
                                <p>Multiple earnings beyond retirement; transgenerational 
                                </p>
                            </div>
                            <ul class="features-list" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <li>Vibrant networking system that increases your networth. </li>
                                <li>We produce what we consume and consume what we produce while we share the profits </li>
                                <li>Turning Consumers into Entrepreneurs for financial success
                                </li>

                                <li>Have access to cutting edge products at amazing price always
                                </li>
                             
                            </ul>
                        </div>
                        <div class="course-view-all" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
                            <a href="{{ url('about') }}" class="edu-btn">About Us <i class="icon-4"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shape-group">
                    <li class="shape-1 circle scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                        <span data-depth="-2.3"></span>
                    </li>
                </ul>
            </div>
        </div>



        <div class="home-four-course edu-course-area course-area-4 gap-tb-text bg-image">
            <div class="container edublink-animated-shape">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Our Services</span>
                    {{-- <h2 class="title">Pick A Course To Get Started</h2> --}}
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    <p style="color: #000"><b>THAMVOS PRODUCTS MANUFACTURERS MULTIPURPOSE COORPERATIVE SOCIETY LIMITED 
                    </b> offers a unique opportunity to achieve financial freedom through a membership-based distribution model. We provide a platform for you to create distribution clusters, market unique products, and build a successful business from the ground up.</p>
                </div>
                <div class="course-view-all" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
                    <a href="{{ url('services') }}" class="edu-btn">Read more Services <i class="icon-4"></i></a>
                </div>
                <ul class="shape-group">
                    <li class="shape-1 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                        <img data-depth="-2" src="assets/images/about/shape-13.png" alt="Shape">
                    </li>
                    <li class="shape-2 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                        <span data-depth="1"></span>
                    </li>
                </ul>
            </div>
        </div>

        <section class="shop-page-area section-gap-equal">
            <div class="container">
               
                <div class="row g-5">

                    @foreach ($view_products as $view_product)
                        @if ($view_product->status == 'approved')
                        <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-product">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="{{ url('products/productdetails/'.$view_product->ref_no) }}">
                                            <img style="width: 270px; height: 320px;" src="{{ URL::asset("/public/../$view_product->images1")}}" alt="Shop Images">
                                        </a>
                                        <div class="product-hover-info">
                                            <ul>
                                                <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                                <li><a href="{{ url('register') }}"><i class="icon-22"></i></a></li>
                                                <li><a href="{{ url('register') }}"><i class="icon-3"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{ url('products/productdetails/'.$view_product->ref_no) }}">{{ $view_product->subcategory['subcategory'] }}</a></h6>
                                        
                                        <div class="price">NGN {{ $view_product->amount }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        @else
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=====================================-->
        <!--=      		Team Area Start   		=-->
        <!--=====================================-->



        <!--=====================================-->
        <!-- Start Categories Area  -->
        <div class="edu-categorie-area categorie-area-4 edu-section-gap" style="background-color: #f0f4f5;">
            <div class="container">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <h2 class="title">Why Choose CenterPrices?</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                    <p style="color: #000">We are your one-hub shop for launching a successful entrepreneurial journey.

                        We’re a community built on the power of association, where we equip individuals with the tools and resources to build transgenerational wealth.
                        
                        Here are some other reasons why people choose us. 
                        
                        Multiple streams of earnings - Earn through product sales, vendor recruitment, and even commission across your downlines
                        </p>
                </div>

                <div class="row g-5">
                    <div class="col-lg-4 col-md-6" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-4 color-primary-style edublink-svg-animate">
                            <div class="icon">
                                <i class="icon-9"></i>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h5 class="title" style="color: #000">Be Your Own Boss </h5>
                                </a>
                                <span class="course-count" style="color: #000">We provide the platform and support to establish yourself as a thriving entrepreneur.
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-4 color-secondary-style ">
                            <div class="icon">
                                <i class="icon-10 art-design"></i>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h5 class="title" style="color: #000">Long-Term Sustainability</h5>
                                </a>
                                <span class="course-count" style="color: #000">Our model is designed to foster long-term success beyond retirement for you and future generations</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-4  color-extra01-style">
                            <div class="icon">
                                <i class="icon-11 personal-development"></i>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h5 class="title" style="color: #000">Low Startup Costst</h5>
                                </a>
                                <span class="course-count" style="color: #000">Get started with minimal investment, unlike traditional businesses requiring significant capital.
                                </span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-4 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-4 color-extra03-style">
                            <div class="icon">
                                <i class="icon-14"></i>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h5 class="title" style="color: #000">Vibrant networking system that increases your networth.</h5>
                                </a>
                                <span class="course-count" style="color: #000">We produce what we consume and consume what we produce while we share the profits 

                                    Turning Consumers into Entrepreneurs for financial success</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Categories Area  -->

 <!-- Start Categories Area  -->
        <div class="features-area-5 gap-bottom-equal">
            <div class="container">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title" style="margin-top: 10px">How to Join</span>
                    <p class="">Joining CSCC is easy! Here’s a simple step-by-step guide:</p>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <div class="features-box color-primary-style edublink-svg-animate">
                            <div class="icon">
                                <i class="icon-20"></i>
                                {{-- <i class="icon fa-internet-explorer"></i> --}}
                            </div>
                            <div class="content">
                                <h5 class="title">Explore</h5>
                                <p>Browse our website to learn more about our products, business model, and the benefits of membership.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="features-box color-secondary-style edublink-svg-animate">
                            <div class="icon">
                                <i class="icon-phone"></i>
                                {{-- <img src="{{ asset('front/assets/images/svg-icons/h-8-shape-35.svg') }}" alt="images svg"> --}}
                            </div>
                            <div class="content">
                                <h5 class="title">Contact Us</h5>
                                <p>Reach out to our friendly team for any questions or clarifications you may have.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="features-box color-extra06-style edublink-svg-animate">
                            <div class="icon">
                                <img src="{{ asset('front/assets/images/svg-icons/h-8-shape-36.svg') }}" alt="images svg">
                            </div>
                            <div class="content">
                                <h5 class="title">Sign Up</h5>
                                <p>Once you’re ready to take the leap, head over to our secure online registration portal and complete the membership application.
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="features-box color-extra06-style edublink-svg-animate">
                            <div class="icon">
                                <i class="icon-68"></i>
                                {{-- <img src="{{ asset('front/assets/images/svg-icons/h-8-shape-36.svg') }}" alt="images svg"> --}}
                            </div>
                            <div class="content">
                                <h5 class="title">Click here to register</h5>
                                <p>
                                    Welcome Aboard!
                                    Upon successful registration, you’ll receive a welcome incentive packages with comprehensive training materials, product information, and ongoing support resources
                                    .
                                </p>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        <!-- End Categories Area  -->


        <!-- Start Ad Banner Area  -->
        <div class="online-academy-cta-wrapper edu-cta-banner-area bg-image">
            <div class="container">
                <div class="edu-cta-banner">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <h2 class="title">Membership  <span class="color-secondary">Options</span> </h2>
                                <p style="color: #000"><b>Distributor Membership:</b> This is the core membership level, allowing you to purchase products at wholesale prices, build your distribution network, and earn through various channels. (Details on pricing and benefits included)</p>
                                <p style="color: #000"><b>Vendor Membership: </b>Focus on selling specific product lines within your network. (Details on pricing and benefits included)</p>
                                <a href="{{ url('register') }}" class="edu-btn">Register Now! <i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shape-group">
                        <li class="shape-01 scene">
                            <img data-depth="2.5" src="{{ asset('front/assets/images/cta/shape-10.png') }}" alt="shape">
                        </li>
                        <li class="shape-02 scene">
                            <img data-depth="-2.5" src="{{ asset('front/assets/images/cta/shape-09.png') }}" alt="shape">
                        </li>
                        <li class="shape-03 scene">
                            <img data-depth="-2" src="{{ asset('front/assets/images/cta/shape-08.png') }}" alt="shape">
                        </li>
                        <li class="shape-04 scene">
                            <img data-depth="2" src="{{ asset('front/assets/images/about/shape-13.png') }}" alt="shape">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Ad Banner Area  -->


        <!-- Start Team Area  -->
        <div class="edu-team-area team-area-2 edu-section-gap">
            <div class="container">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Team</span>
                    <h2 class="title">Our Team</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    <!-- Start Instructor Grid  -->
                    @foreach ($view_teams as $view_team)
                        @if ($view_team->status == 'approved')
                        <div class="col-lg-4 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-team-grid team-style-2">
                                <div class="inner">
                                    <div class="thumbnail-wrap">
                                        <div class="thumbnail">
                                            <a href="{{ url('teams/teamdetails/'.$view_team->ref_no) }}">
                                                <img src="{{ URL::asset("/public/../$view_team->images")}}" alt="team images">
                                            </a>
                                        </div>
                                        <ul class="team-share-info">
                                            <li><a href="{{ $view_team->facebook }}"><i class="icon-facebook"></i></a></li>
                                            <li><a href="{{ $view_team->twitter }}"><i class="icon-twitter"></i></a></li>
                                            <li><a href="{{ $view_team->linkedin }}"><i class="icon-linkedin2"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="{{ url('teams/teamdetails/'.$view_team->ref_no) }}">{{ $view_team->fname }} {{ $view_team->lname }}</a></h5>
                                        <span class="designation">{{ $view_team->position }}</span>
                                        {{-- <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            
                        @endif
                    @endforeach
                    
                </div>
                
            </div>
            <div class="text-center">
                <a style="margin-top: 20px;" href="{{ url('team') }}" class="edu-btn">More Team <i class="icon-4"></i></a>

            </div>

        </div>
        <!-- End Team Area  -->
        <!--=====================================-->
        <!--=       CounterUp Area Start      	=-->

        
        <!-- Start Testimonial Area  -->
        <div class="testimonial-area-5 gap-lg-bottom-equal">
            <div class="container">
                <div class="row g-lg-5">
                    <div class="col-lg-5">
                        <div class="testimonial-heading-area">
                            <div class="section-title section-left" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <span class="pre-title">Testimonials</span>
                                <h2 class="title">What Our Member Have To Say</h2>
                                <span class="shape-line"><i class="icon-19"></i></span>
                                <p>Discover how CSCC has empowered individuals to achieve financial freedom, build thriving networks, and transform their health and wealth</p>
                                {{-- <a href="#" class="edu-btn btn-large">View All<i class="icon-4"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="swiper-testimonial-slider-wrapper swiper testimonial-coverflow">
                            <div class="swiper-wrapper">
                                @foreach ($view_testimonies as $view_testimonie)
                                    @if ($view_testimonie->status == 'approved')
                                    <div class="swiper-slide">
                                        <div class="testimonial-grid">
                                            <div class="thumbnail">
                                                <img style="width: 70px; height: 70px;" src="{{ URL::asset("/public/../$view_testimonie->images")}}" alt="Testimonial">
                                                <span class="qoute-icon"><i class="icon-26"></i></span>
    
                                            </div>
                                            <div class="content">
                                                <p>{!! $view_testimonie->messages !!}</p>
                                                
                                                <h5 class="title">{{ $view_testimonie->fname }} {{ $view_testimonie->lname }}</h5>
                                                <span class="subtitle">{{ $view_testimonie->position }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        
                                    @endif
                                @endforeach
                            
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonial Area  -->
        
        <!--=====================================-->
        <!--=       	FAQ Area Start      	=-->
      
     
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
                                            <a href="{{ url('news/newsdetails/'.$view_blog->slug.$view_blog->slug) }}">
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
                   
                    
                    <!-- End Event Grid  -->
                    <div class="text-center">
                        <a style="margin-top: 20px;" href="{{ url('blog') }}" class="edu-btn">View More <i class="icon-4"></i></a>
        
                    </div>
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
        <!--=====================================-->
        <!--=       	CTA Area Start      	=-->
        <!--=====================================-->
       
        
        <!--=====================================-->
        <!--=        Footer Area Start       	=-->
        <!--=====================================-->
       @include('pages.common.footer')