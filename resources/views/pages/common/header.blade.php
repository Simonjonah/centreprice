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

    {{-- <div id="edublink-preloader">
        <div class="loading-spinner">
            <div class="preloader-spin-1"></div>
            <div class="preloader-spin-2"></div>
        </div>
        <div class="preloader-close-btn-wraper">
            <span class="btn btn-primary preloader-close-btn">
                Cancel Preloader</span>
        </div>
    </div> --}}

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
                                <li><a href="tel:+2348080557395"><i class="icon-phone"></i>Call: +234 808 055 7395</a></li>
                                <li><a href="mailto:info@centerprices.com" target="_blank"><i class="icon-house"></i>Powered  By: Thamvos Products Manufacturers MPCS Ltd
                                   <br> <span style="font-size: 10px; font-style: italic;">... Turning Consumers into Entrepreneurs for Financial Success!</span></a></li>
                            </ul>
                        </div>
                        <div class="header-top-right">
                            <ul class="header-info">
                                <li><a href="{{ url('login') }}">Login</a></li>
                                <li class="header-btn"><a href="{{ url('register') }}" class="edu-btn btn-medium">Register <i class="icon-4"></i></a></li>
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
                                    <li><a href="{{ url('/') }}">Home </a></li>
                                    <li><a href="{{ url('about') }}">About Us </a></li>
                                    
                                    <li><a href="{{ url('register') }}">Register </a></li>
                                    <li><a href="{{ url('products1') }}">Products </a></li>
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
                        <li><a href="{{ url('/') }}">Home </a></li>
                        <li><a href="{{ url('about') }}">About Us </a></li>
                        <li><a href="{{ url('register') }}">Register </a></li>
                        <li><a href="{{ url('products1') }}">Products1 </a></li>
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