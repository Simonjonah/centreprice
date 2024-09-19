<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CenterPrices</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/images/logo/logo.jpeg') }}">
    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/magnifypopup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/animation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/jqueru-ui-min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/tipped.min.css') }}">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/app.css') }}">

</head>

<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->

    <div id="edublink-preloader">
        <div class="loading-spinner">
            <div class="preloader-spin-1"></div>
            <div class="preloader-spin-2"></div>
        </div>
        <div class="preloader-close-btn-wraper">
            <span class="btn btn-primary preloader-close-btn">
                Cancel Preloader</span>
        </div>
    </div>

    <div id="main-wrapper" class="main-wrapper">

        <!--=====================================-->
        <!--=        Header Area Start       	=-->
        <!--=====================================-->
        <header class="edu-header header-style-3">
            <div class="header-top-bar">
                <div class="container">
                    <div class="header-top">
                        <div class="header-top-left">
                            <ul class="header-info">
                                <li><a href="tel:+011235641231"><i class="icon-phone"></i>Call: 123 4561 5523</a></li>
                                <li><a href="mailto:info@centerprices.com" target="_blank"><i class="icon-envelope"></i>Email: info@centerprices.com</a></li>
                            </ul>
                        </div>
                        <div class="header-top-right">
                            <ul class="header-info">
                                <li><a href="{{ url('login') }}">Login</a></li>
                                <li class="header-btn"><a href="{{ url('registervendor') }}" class="edu-btn btn-medium">Register <i class="icon-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edu-sticky-placeholder"></div>
            <div class="header-mainmenu">
                <div class="container">
                    <div class="header-navbar">
                        <div class="header-brand">
                            <div class="logo">
                                <a href="{{ url('home') }}">
                                    <img style="width: 100px; height: 100px;" class="logo-light" src="{{ asset('front/assets/images/logo/logo.jpeg') }}" alt="Corporate Logo">
                                    <img style="width: 100px; height: 100px;" class="logo-dark" src="{{ asset('front/assets/images/logo/logo.jpeg') }}" alt="Corporate Logo">
                                </a>
                            </div>
                        </div>
                        <div class="header-mainnav">
                            <nav class="mainmenu-nav">
                                <ul class="mainmenu">
                                    <li><a href="{{ url('home') }}">Home </a></li>
                                    <li><a href="{{ url('about') }}">About Us </a></li>
                                    <li><a href="{{ url('registervendor') }}">Register </a></li>
                                    <li><a href="{{ url('products') }}">Products </a></li>
                                    <li><a href="{{ url('services') }}">Services </a></li>
                                    <li><a href="{{ url('contact') }}">Contact </a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <ul class="header-action">
                                <li class="icon search-icon">
                                    <a href="javascript:void(0)" class="search-trigger">
                                        <i class="icon-2"></i>
                                    </a>
                                </li>
                                <li class="icon cart-icon">
                                    <a href="cart.html" class="cart-icon">
                                        <i class="icon-3"></i>
                                        <span class="count">0</span>
                                    </a>
                                </li>
                                <li class="mobile-menu-bar d-block d-xl-none">
                                    <button class="hamberger-button">
                                        <i class="icon-54"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-mobile-menu">
                <div class="inner">
                    <div class="header-top">
                        <div class="logo">
                            <a href="{{ url('home') }}">
                                <img style="width: 100px; height: 100px" class="logo-light" src="{{ asset('front/assets/images/logo/logo.jpeg') }}" alt="Corporate Logo">
                                <img style="width: 100px; height: 100px" class="logo-dark" src="{{ asset('front/assets/images/logo/logo.jpeg') }}" alt="Corporate Logo">
                            </a>
                        </div>
                        <div class="close-menu">
                            <button class="close-button">
                                <i class="icon-73"></i>
                            </button>
                        </div>
                    </div>
                    <ul class="mainmenu">
                        <li><a href="{{ url('home') }}">Home </a></li>
                        <li><a href="{{ url('about') }}">About Us </a></li>
                        <li><a href="{{ url('registervendor') }}">Register </a></li>
                        <li><a href="{{ url('products') }}">Products </a></li>
                        <li><a href="{{ url('services') }}">Services </a></li>
                        <li><a href="{{ url('contact') }}">Contact </a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Search Popup  -->
            <div class="edu-search-popup">
                <div class="content-wrap">
                    <div class="site-logo">
                            <img style="width: 100px; height: 100px" class="logo-light" src="{{ asset('front/assets/images/logo/logo.jpeg') }}" alt="Corporate Logo">
                            <img style="width: 100px; height: 100px" class="logo-dark" src="{{ asset('front/assets/images/logo/logo.jpeg') }}" alt="Corporate Logo">
                    </div>
                    <div class="close-button">
                        <button class="close-trigger"><i class="icon-73"></i></button>
                    </div>
                    <div class="inner">
                        <form class="search-form" action="#">
                            <input type="text" class="edublink-search-popup-field" placeholder="Search Here...">
                            <button class="submit-button"><i class="icon-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Search Popup  -->
        </header>
        <!--=====================================-->
        <!--=       Hero Banner Area Start      =-->
        <!--=====================================-->
        <div class="hero-banner hero-style-4 bg-image">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="banner-content">
                            <h1 class="title" data-sal-delay="100" data-sal="slide-up" data-sal-duration="1000">Center Prices</h1>
                            <p data-sal-delay="200" data-sal="slide-up" data-sal-duration="1000">Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit.</p>
                            {{-- <div class="banner-btn" data-sal-delay="400" data-sal="slide-up" data-sal-duration="1000">
                                <a href="#" class="edu-btn">Find courses <i class="icon-4"></i></a>
                            </div> --}}
                            <div class="row">
                                <div class="col-sm-3 col-md-6 col-lg-3">
                                    <div class="categorie-grid categorie-style-3 color-extra04-style">
                                        <div class="icon">
                                            <i class="icon-11"></i>
                                        </div>
                                        <div class="content">
                                            <a href="course-one.html">
                                                <h5 class="title">Domestic Care</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-6 col-lg-3">
                                    <div class="categorie-grid categorie-style-3 color-extra04-style">
                                        <div class="icon">
                                            <i class="icon-11"></i>
                                        </div>
                                        <div class="content">
                                            <a href="course-one.html">
                                                <h5 class="title">Health & Wellness</h5>
                                            </a>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 col-md-6 col-lg-3">
                                    <div class="categorie-grid categorie-style-3 color-extra04-style">
                                        <div class="icon">
                                            <i class="icon-11"></i>
                                        </div>
                                        <div class="content">
                                            <a href="course-one.html">
                                                <h5 class="title">Agro-Alied</h5>
                                            </a>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 col-md-6 col-lg-3">
                                    <div class="categorie-grid categorie-style-3 color-extra04-style">
                                        <div class="icon">
                                            <i class="icon-11"></i>
                                        </div>
                                        <div class="content">
                                            <a href="course-one.html">
                                                <h5 class="title">Construction Auxiliary</h5>
                                            </a>
                                        </div>
                                    </div> 
                                 </div>

                                <div style="margin-top: 60px;" class="banner-btn" data-sal-delay="400" data-sal="slide-up" data-sal-duration="1000">
                                <a href="{{ url('registervendor') }}" class="edu-btn">Join Our Community <i class="icon-4"></i></a>
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
                    <div class="col" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-primary-style">
                            <div class="icon">
                                <i class="icon-9"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title">Domestics</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-secondary-style">
                            <div class="icon">
                                <i class="icon-10"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title"> Personal Care</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-extra04-style">
                            <div class="icon">
                                <i class="icon-11"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title">Health & Wellness</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-tertiary-style">
                            <div class="icon">
                                <i class="icon-12"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title">Agro-Alied</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-extra02-style">
                            <div class="icon">
                                <i class="icon-13"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title">Construction Auxiliary</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-extra07-style">
                            <div class="icon design-pencil-icon">
                                <i class="icon-42"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title">Petroleum</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="categorie-grid categorie-style-3 color-extra06-style">
                            <div class="icon">
                                <i class="icon-14"></i>
                            </div>
                            <div class="content">
                                <a href="course-one.html">
                                    <h5 class="title">Coating & Corrossion</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Categories Area  -->
        <!--=====================================-->
        <!--=       Course Area Start      		=-->
        <!--=====================================-->
        <!-- Start Course Area  -->
        <div class="home-four-course edu-course-area course-area-4 gap-tb-text bg-image">
            <div class="container edublink-animated-shape">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Popular Courses</span>
                    <h2 class="title">Pick A Course To Get Started</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    <!-- Start Single Course  -->
                    <div class="col-xl-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-course course-style-4">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="course-details.html">
                                        <img src="assets/images/course/course-11.jpg" alt="Course Meta">
                                    </a>
                                    <div class="time-top">
                                        <span class="duration"><i class="icon-61"></i>8 Weeks</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="course-price">$35.00</div>
                                    <h6 class="title">
                                        <a href="course-details.html">The Complete Camtasia Course for Content Creators</a>
                                    </h6>
                                    <div class="course-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(5.0 /9 Rating)</span>
                                    </div>
                                    <ul class="course-meta">
                                        <li><i class="icon-24"></i>15 Lessons</li>
                                        <li><i class="icon-25"></i>32 Students</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->
                    <!-- Start Single Course  -->
                    <div class="col-xl-6" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-course course-style-4">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="course-details.html">
                                        <img src="assets/images/course/course-12.jpg" alt="Course Meta">
                                    </a>
                                    <div class="time-top">
                                        <span class="duration"><i class="icon-61"></i>5 Weeks</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="course-price">$49.00</div>
                                    <h6 class="title">
                                        <a href="course-details.html">Master Your Personal Brand Like a Marketing Pro</a>
                                    </h6>
                                    <div class="course-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(4.9 /5 Rating)</span>
                                    </div>
                                    <ul class="course-meta">
                                        <li><i class="icon-24"></i>24 Lessons</li>
                                        <li><i class="icon-25"></i>29 Students</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->
                    <!-- Start Single Course  -->
                    <div class="col-xl-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-course course-style-4">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="course-details.html">
                                        <img src="assets/images/course/course-13.jpg" alt="Course Meta">
                                    </a>
                                    <div class="time-top">
                                        <span class="duration"><i class="icon-61"></i>7 Weeks</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="course-price">$59.00</div>
                                    <h6 class="title">
                                        <a href="course-details.html">Java Programming Masterclass for Software Developers</a>
                                    </h6>
                                    <div class="course-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(5.0 /7 Rating)</span>
                                    </div>
                                    <ul class="course-meta">
                                        <li><i class="icon-24"></i>8 Lessons</li>
                                        <li><i class="icon-25"></i>20 Students</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->
                    <!-- Start Single Course  -->
                    <div class="col-xl-6" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-course course-style-4">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="course-details.html">
                                        <img src="assets/images/course/course-14.jpg" alt="Course Meta">
                                    </a>
                                    <div class="time-top">
                                        <span class="duration"><i class="icon-61"></i>9 Weeks</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="course-price">$55.00</div>
                                    <h6 class="title">
                                        <a href="course-details.html">The Ultimate Drawing Course - Beginner to Advanced</a>
                                    </h6>
                                    <div class="course-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(5.0 /7 Rating)</span>
                                    </div>
                                    <ul class="course-meta">
                                        <li><i class="icon-24"></i>19 Lessons</li>
                                        <li><i class="icon-25"></i>35 Students</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->
                </div>
                <div class="course-view-all" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
                    <a href="course-one.html" class="edu-btn">Browse more courses <i class="icon-4"></i></a>
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
        <!-- End Course Area -->
        <!--=====================================-->
        <!--=      		Brand Area Start   		=-->
        <!--=====================================-->
         <!--=           Shop Area Start         =-->
        <!--=====================================-->
        <section class="shop-page-area section-gap-equal">
            <div class="container">
                <div class="edu-sorting-area">
                    <div class="sorting-left">
                        <h6 class="showing-text">We found <span>71</span> courses available for you</h6>
                    </div>
                    <div class="sorting-right">
                        <div class="edu-sorting">
                            <div class="icon"><i class="icon-55"></i></div>
                            <select class="edu-select">
                                <option>Filters</option>
                                <option>Low To High</option>
                                <option>High Low To</option>
                                <option>Last Viewed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-01.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Sing To It</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-02.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Natural Science Project</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-03.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">The King of Drugs</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-04.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Ray Brandbury</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-05.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Educated A Memoir</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="350" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-06.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">The Silver Chair</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="400" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-07.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Harry Potter</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="450" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-08.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Code Breaker</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="500" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-09.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Vanguard</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="550" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-10.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Arctic Sea</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="600" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-11.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Secret Sky</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-sal-delay="650" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-product">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="product-details.html">
                                        <img src="assets/images/shop/product-12.jpg" alt="Shop Images">
                                    </a>
                                    <div class="product-hover-info">
                                        <ul>
                                            <li><a data-bs-toggle="modal" href="#pro-quick-view" role="button"><i class="icon-2"></i></a></li>
                                            <li><a href="wishlist.html"><i class="icon-22"></i></a></li>
                                            <li><a href="cart.html"><i class="icon-3"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="product-details.html">Women Who Launch</a></h6>
                                    <div class="product-rating">
                                        <div class="rating">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <span class="rating-count">(3)</span>
                                    </div>
                                    <div class="price">$70.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <ul class="edu-pagination pt--50">
                    <li><a href="#" aria-label="Previous"><i class="icon-west"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="more-next"><a href="#"></a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#" aria-label="Next"><i class="icon-east"></i></a></li>
                </ul>

            </div>
        </section>
        <!--=====================================-->
        <!--=====================================-->
        <!--=      		Team Area Start   		=-->
        <!--=====================================-->
        <!-- Start Team Area  -->
        <div class="edu-team-area team-area-2 edu-section-gap">
            <div class="container">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Instructors</span>
                    <h2 class="title">Course Instructors</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    <!-- Start Instructor Grid  -->
                    <div class="col-lg-4 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-team-grid team-style-2">
                            <div class="inner">
                                <div class="thumbnail-wrap">
                                    <div class="thumbnail">
                                        <a href="team-details.html">
                                            <img src="assets/images/team/team-05.webp" alt="team images">
                                        </a>
                                    </div>
                                    <ul class="team-share-info">
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="team-details.html">Jane Seymour</a></h5>
                                    <span class="designation">UI Designer</span>
                                    <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Instructor Grid  -->
                    <!-- Start Instructor Grid  -->
                    <div class="col-lg-4 col-md-6" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-team-grid team-style-2">
                            <div class="inner">
                                <div class="thumbnail-wrap">
                                    <div class="thumbnail">
                                        <a href="team-details.html">
                                            <img src="assets/images/team/team-06.webp" alt="team images">
                                        </a>
                                    </div>
                                    <ul class="team-share-info">
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="team-details.html">Edward Norton</a></h5>
                                    <span class="designation">Web Developer</span>
                                    <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Instructor Grid  -->
                    <!-- Start Instructor Grid  -->
                    <div class="col-lg-4 col-md-6" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-team-grid team-style-2">
                            <div class="inner">
                                <div class="thumbnail-wrap">
                                    <div class="thumbnail">
                                        <a href="team-details.html">
                                            <img src="assets/images/team/team-07.webp" alt="team images">
                                        </a>
                                    </div>
                                    <ul class="team-share-info">
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="team-details.html">Penelope Cruz</a></h5>
                                    <span class="designation">Digital Marketer</span>
                                    <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Instructor Grid  -->
                </div>
            </div>
        </div>
        <!-- End Team Area  -->
        <!--=====================================-->
        <!--=       CounterUp Area Start      	=-->
        <!--=====================================-->
        <div class="counterup-area-3 gap-bottom-equal">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3 col-sm-6">
                        <div class="edu-counterup counterup-style-3">
                            <h2 class="counter-item count-number primary-color">
                                <span class="odometer" data-odometer-final="29.3">.</span><span>K</span>
                            </h2>
                            <h6 class="title">Student Enrolled</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="edu-counterup counterup-style-3">
                            <h2 class="counter-item count-number secondary-color">
                                <span class="odometer" data-odometer-final="32.4">.</span><span>K</span>
                            </h2>
                            <h6 class="title">Class Completed</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="edu-counterup counterup-style-3">
                            <h2 class="counter-item count-number extra02-color">
                                <span class="odometer" data-odometer-final="100">.</span><span>%</span>
                            </h2>
                            <h6 class="title">Satisfaction Rate</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="edu-counterup counterup-style-3 border-none">
                            <h2 class="counter-item count-number extra05-color">
                                <span class="odometer" data-odometer-final="354">.</span><span>+</span>
                            </h2>
                            <h6 class="title">Top Instructors</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================-->
        <!--=       	FAQ Area Start      	=-->
        <!--=====================================-->
        <div class="edu-faq-area faq-style-2 bg-image">
            <div class="container">
                <div class="row g-5 row--45">
                    <div class="col-lg-6" data-sal-delay="50" data-sal="slide-up" data-sal-duration="1000">
                        <div class="edu-faq-content">
                            <div class="section-title section-left">
                                <span class="pre-title">FAq’s</span>
                                <h2 class="title">Learn Your Best Education Culture with EduBlink</h2>
                                <span class="shape-line"><i class="icon-19"></i></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt labore dolore magna.</p>
                            </div>
                            <div class="faq-accordion" id="faq-accordion">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                How can I contact a school directly?
                                            </button>
                                        </h5>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eius mod ex tempor incididunt labore dolore magna aliquaenim ad minim eniam.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                How do I find a school where I want to study?
                                            </button>
                                        </h5>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eius mod ex tempor incididunt labore dolore magna aliquaenim ad minim eniam.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                                Where should I study abroad?
                                            </button>
                                        </h5>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eius mod ex tempor incididunt labore dolore magna aliquaenim ad minim eniam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="edu-faq-gallery">
                            <div class="row g-5">
                                <div class="col-6" data-sal-delay="50" data-sal="slide-down" data-sal-duration="1000">
                                    <div class="faq-thumbnail thumbnail-1">
                                        <img src="assets/images/faq/faq-05.webp" alt="Faq Images">
                                    </div>
                                </div>
                                <div class="col-6" data-sal-delay="50" data-sal="slide-up" data-sal-duration="1000">
                                    <div class="faq-thumbnail thumbnail-2">
                                        <img src="assets/images/faq/faq-06.webp" alt="Faq Images">
                                    </div>
                                </div>
                            </div>
                            <ul class="shape-group">
                                <li class="shape-1 scene">
                                    <img data-depth="2" src="assets/images/faq/shape-06.png" alt="Shape Images">
                                </li>
                                <li class="shape-2">
                                    <img data-depth="-2" src="assets/images/faq/shape-04.png" alt="Shape Images">
                                </li>
                                <li class="shape-3 scene">
                                    <img data-depth="2" src="assets/images/faq/shape-16.png" alt="Shape Images">
                                </li>
                                <li class="shape-4 scene">
                                    <img data-depth="-2" src="assets/images/banner/shape-03.png" alt="Shape Images">
                                </li>
                                <li class="shape-5 scene">
                                    <img data-depth="-2" src="assets/images/faq/shape-08.png" alt="Shape Images">
                                </li>
                                <li class="shape-6 scene">
                                    <img data-depth="1.7" src="assets/images/faq/shape-09.png" alt="Shape Images">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================-->
        <!--=       Event Area Start      		=-->
        <!--=====================================-->
        <!-- Start Event Area  -->
        <div class="edu-event-area event-area-2">
            <div class="container edublink-animated-shape">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Events & News</span>
                    <h2 class="title">Popular Events & News</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5">
                    <!-- Start Event Grid  -->
                    <div class="col-lg-4 col-md-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-event event-style-1">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="event-details.html">
                                        <img src="assets/images/event/event-01.jpg" alt="Blog Images">
                                    </a>
                                    <div class="event-time">
                                        <span><i class="icon-33"></i>08:00AM-10:00PM</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="event-date">
                                        <span class="day">30</span>
                                        <span class="month">SEP</span>
                                    </div>
                                    <h5 class="title"><a href="event-details.html">Learn English in Ease</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectur elit sed eiusmod ex tempor incididunt labore dolore magna.</p>
                                    <ul class="event-meta">
                                        <li><i class="icon-40"></i>Newyork City, USA</li>
                                    </ul>
                                    <div class="read-more-btn">
                                        <a class="edu-btn btn-small btn-secondary" href="event-details.html">Learn More <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Event Grid  -->
                    <!-- Start Event Grid  -->
                    <div class="col-lg-4 col-md-6" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-event event-style-1">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="event-details.html">
                                        <img src="assets/images/event/event-02.jpg" alt="Blog Images">
                                    </a>
                                    <div class="event-time">
                                        <span><i class="icon-33"></i>04:00PM-07:00PM</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="event-date">
                                        <span class="day">25</span>
                                        <span class="month">DEC</span>
                                    </div>
                                    <h5 class="title"><a href="event-details.html">Annual Workshop</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectur elit sed eiusmod ex tempor incididunt labore dolore magna.</p>
                                    <ul class="event-meta">
                                        <li><i class="icon-40"></i>Washington D.C, USA</li>
                                    </ul>
                                    <div class="read-more-btn">
                                        <a class="edu-btn btn-small btn-secondary" href="event-details.html">Learn More <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Event Grid  -->
                    <!-- Start Event Grid  -->
                    <div class="col-lg-4 col-md-6" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-event event-style-1">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="event-details.html">
                                        <img src="assets/images/event/event-03.jpg" alt="Blog Images">
                                    </a>
                                    <div class="event-time">
                                        <span><i class="icon-33"></i>10:00AM-11:00AM</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="event-date">
                                        <span class="day">15</span>
                                        <span class="month">NOV</span>
                                    </div>
                                    <h5 class="title"><a href="event-details.html">Design Think & Innovation</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectur elit sed eiusmod ex tempor incididunt labore dolore magna.</p>
                                    <ul class="event-meta">
                                        <li><i class="icon-40"></i>Newyork City, USA</li>
                                    </ul>
                                    <div class="read-more-btn">
                                        <a class="edu-btn btn-small btn-secondary" href="event-details.html">Learn More <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Event Grid  -->
                </div>

                <ul class="shape-group">
                    <li class="shape-1" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                        <img class="rotateit" src="assets/images/about/shape-13.png" alt="Shape">
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
        <!-- Start CTA Area  -->
        <div class="cta-area-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="home-four-cta edu-cta-box cta-style-3 bg-image bg-image--16">
                            <div class="inner">
                                <div class="content text-end">
                                    <span class="subtitle">Get In Touch:</span>
                                    <h3 class="title"><a href="mailto:info@edublink">info@edublink</a></h3>
                                </div>
                                <div class="sparator">
                                    <span>or</span>
                                </div>
                                <div class="content">
                                    <span class="subtitle">Call Us Via:</span>
                                    <h3 class="title"><a href="tel:+011235641231">+01 123 5641 231</a></h3>
                                </div>
                            </div>
                            <ul class="shape-group">
                                <li class="shape-01 scene">
                                    <img data-depth="2" src="assets/images/cta/shape-06.png" alt="shape">
                                </li>
                                <li class="shape-02 scene">
                                    <img data-depth="-2" src="assets/images/cta/shape-12.png" alt="shape">
                                </li>
                                <li class="shape-03 scene">
                                    <img data-depth="-3" src="assets/images/cta/shape-04.png" alt="shape">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End CTA Area  -->
        <!--=====================================-->
        <!--=       	Blog Area Start      	=-->
        <!--=====================================-->
        <!-- Start Blog Area  -->
        <div class="edu-blog-area blog-area-3 edu-section-gap">
            <div class="container">
                <div class="section-title section-center" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Latest Articles</span>
                    <h2 class="title">Get News with EduBlink</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
                <div class="row g-5 row--45">
                    <!-- Start Blog Grid  -->
                    <div class="col-lg-6 col-12" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-blog blog-style-2 first-large-blog">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="blog-details.html">
                                        <img src="assets/images/blog/blog-04.jpg" alt="Blog Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="blog-date">
                                        <span class="day">27</span>
                                        <span class="month">SEP</span>
                                    </div>
                                    <div class="category-wrap">
                                        <a href="#" class="blog-category">ONLINE</a>
                                    </div>
                                    <h4 class="title"><a href="blog-details.html">Eco-Education in Our Lives: We Can Change the Future</a></h4>
                                    <p>Lorem ipsum dolor sit amet consec tetur adipisicing sed eiusmod tempor incid idunt labore.</p>
                                    <ul class="blog-meta">
                                        <li><i class="icon-25"></i>By <a href="#">Edward</a></li>
                                        <li><i class="icon-28"></i>Com 09</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Grid  -->
                    <div class="col-lg-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-blog blog-style-2">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="blog-details.html">
                                        <img src="assets/images/blog/blog-05.jpg" alt="Blog Images">
                                    </a>
                                    <div class="blog-date">
                                        <span class="day">27</span>
                                        <span class="month">SEP</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="category-wrap">
                                        <a href="#" class="blog-category">Lecture</a>
                                    </div>
                                    <h5 class="title"><a href="blog-details.html">Qualification for Students’ Satisfaction Rate</a></h5>
                                    <ul class="blog-meta">
                                        <li><i class="icon-25"></i>By <a href="#">Edward</a></li>
                                        <li><i class="icon-28"></i>Com 09</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="edu-blog blog-style-2">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="blog-details.html">
                                        <img src="assets/images/blog/blog-06.jpg" alt="Blog Images">
                                    </a>
                                    <div class="blog-date">
                                        <span class="day">28</span>
                                        <span class="month">SEP</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="category-wrap">
                                        <a href="#" class="blog-category">Lecture</a>
                                    </div>
                                    <h5 class="title"><a href="blog-details.html">Instructional Design and Adult Learners</a></h5>
                                    <ul class="blog-meta">
                                        <li><i class="icon-25"></i>By <a href="#">Edward</a></li>
                                        <li><i class="icon-28"></i>Com 09</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="edu-blog blog-style-2">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="blog-details.html">
                                        <img src="assets/images/blog/blog-10.jpg" alt="Blog Images">
                                    </a>
                                    <div class="blog-date">
                                        <span class="day">30</span>
                                        <span class="month">SEP</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="category-wrap">
                                        <a href="#" class="blog-category">Lecture</a>
                                    </div>
                                    <h5 class="title"><a href="blog-details.html">Join ATD 2021 International Conference & EXPO</a></h5>
                                    <ul class="blog-meta">
                                        <li><i class="icon-25"></i>By <a href="#">Edward</a></li>
                                        <li><i class="icon-28"></i>Com 09</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Area -->
        <!--=====================================-->
        <!--=       CTA Banner Area Start      =-->
        <!--=====================================-->
        <!-- Start Ad Banner Area  -->
        <div class="online-academy-cta-wrapper edu-cta-banner-area bg-image">
            <div class="container">
                <div class="edu-cta-banner">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <h2 class="title">Get Your Quality Skills <span class="color-secondary">Certificate</span> Through EduBlink</h2>
                                <a href="contact-us.html" class="edu-btn">Get started now <i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shape-group">
                        <li class="shape-01 scene">
                            <img data-depth="2.5" src="assets/images/cta/shape-10.png" alt="shape">
                        </li>
                        <li class="shape-02 scene">
                            <img data-depth="-2.5" src="assets/images/cta/shape-09.png" alt="shape">
                        </li>
                        <li class="shape-03 scene">
                            <img data-depth="-2" src="assets/images/cta/shape-08.png" alt="shape">
                        </li>
                        <li class="shape-04 scene">
                            <img data-depth="2" src="assets/images/about/shape-13.png" alt="shape">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Ad Banner Area  -->
        <!--=====================================-->
        <!--=        Footer Area Start       	=-->
        <!--=====================================-->
        <!-- Start Footer Area  -->
        <footer class="edu-footer footer-dark bg-image footer-style-2">
            <div class="footer-top footer-top-2">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <div class="edu-footer-widget">
                                <div class="logo">
                                    <a href="index.html">
                                        <img class="logo-light" src="assets/images/logo/logo-white.png" alt="Corporate Logo">
                                    </a>
                                </div>
                                <p class="description">Lorem ipsum dolor amet consecto adi pisicing elit sed eiusm tempor incidid unt labore dolore.</p>
                                <div class="widget-information">
                                    <ul class="information-list">
                                        <li><span>Add:</span>70-80 Upper St Norwich NR2</li>
                                        <li><span>Call:</span><a href="tel:+011235641231">+01 123 5641 231</a></li>
                                        <li><span>Email:</span><a href="mailto:info@edublink.com" target="_blank">info@edublink.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="edu-footer-widget explore-widget">
                                <h4 class="widget-title">Online Platform</h4>
                                <div class="inner">
                                    <ul class="footer-link link-hover">
                                        <li><a href="about-one.html">About</a></li>
                                        <li><a href="course-one.html">Courses</a></li>
                                        <li><a href="team-one.html">Instructor</a></li>
                                        <li><a href="event-grid.html">Events</a></li>
                                        <li><a href="team-details.html">Instructor Profile</a></li>
                                        <li><a href="purchase-guide.html">Purchase Guide</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="edu-footer-widget quick-link-widget">
                                <h4 class="widget-title">Links</h4>
                                <div class="inner">
                                    <ul class="footer-link link-hover">
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="gallery-grid.html">Gallery</a></li>
                                        <li><a href="blog-standard.html">News & Articles</a></li>
                                        <li><a href="faq.html">FAQ's</a></li>
                                        <li><a href="my-account.html">Sign In/Registration</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="edu-footer-widget">
                                <h4 class="widget-title">Contacts</h4>
                                <div class="inner">
                                    <p class="description">Enter your email address to register to our newsletter subscription</p>
                                    <div class="input-group footer-subscription-form">
                                        <input type="email" class="form-control" placeholder="Your email">
                                        <button class="edu-btn btn-medium" type="button">Subscribe <i class="icon-4"></i></button>
                                    </div>
                                    <ul class="social-share icon-transparent">
                                        <li><a href="#" class="color-fb"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#" class="color-linkd"><i class="icon-linkedin2"></i></a></li>
                                        <li><a href="#" class="color-ig"><i class="icon-instagram"></i></a></li>
                                        <li><a href="#" class="color-twitter"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#" class="color-yt"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner text-center">
                                <p>Copyright 2022 <a href="https://1.envato.market/5bQ022" target="_blank">EduBlink</a> Designed By <a href="https://themeforest.net/user/devsblink">DevsBlink</a>. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area  -->



    </div>

    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS
	============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('front/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- Jquery Js -->
    <script src="{{ asset('front/assets/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/backtotop.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/magnifypopup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/odometer.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/isotop.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/imageloaded.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/lightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/paralax.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/paralax-scroll.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/svg-inject.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/vivus.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/tipped.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/isInViewport.jquery.min.js') }}"></script>

    <!-- Site Scripts -->
    <script src="{{ asset('front/assets/js/app.js') }}"></script>
</body>

</html>