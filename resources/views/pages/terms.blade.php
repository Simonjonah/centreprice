@include('pages.common.header')
        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Terms & Condition</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Terms & Condition</li>
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
        <!--=====================================-->
        <!--=           Cart Area Start         =-->
        <!--=====================================-->
        <section class="privacy-policy-area terms-condition-area">
            <div class="container">
                <div class="row row--30">
                    <div class="col-lg-8">
                        <div class="privacy-policy terms-condition">
                            <div class="text-block">
                                <h3 class="title">Definitions of Basic Terms, Rights and Restriction:</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. </p>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                            </div>
                            <div class="text-block">
                                <h4 class="title">Basic Terms</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nis aliquip commodo consequat aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat. </p>
                            </div>
                            <div class="text-block">
                                <h4 class="title">Rights & Restrictions</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <ul>
                                    <li>Members must be at least 18 years of age.</li>
                                    <li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicenseable right to access that portion of the online course corresponding to the purchase.</li>
                                    <li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member’s purchase.</li>
                                    <li>The videos in the course are provided as a video stream and are not downloadable.</li>
                                    <li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form. </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="edu-blog-sidebar">
                            <!-- Start Single Widget  -->
                            <div class="edu-blog-widget widget-search">
                                <div class="inner">
                                    <h4 class="widget-title">Search</h4>
                                    <div class="content">
                                        <form class="blog-search" action="#">
                                            <button class="search-button"><i class="icon-2"></i></button>
                                            <input type="text" placeholder="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Widget  -->
                            <!-- Start Single Widget  -->
                            <div class="edu-blog-widget widget-tags">
                                <div class="inner">
                                    <h4 class="widget-title">Tags</h4>
                                    <div class="content">
                                        <div class="tag-list">
                                            <a href="#">Language</a>
                                            <a href="#">eLearn</a>
                                            <a href="#">Tips</a>
                                            <a href="#">Course</a>
                                            <a href="#">Motivation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Widget  -->
                            <!-- Start Single Widget  -->
                            <div class="edu-blog-widget widget-categories">
                                <div class="inner">
                                    <h4 class="widget-title">Categories</h4>
                                    <div class="content">
                                        <ul class="category-list">
                                            <li><a href="#">Business Studies <span>(3)</span></a></li>
                                            <li><a href="#">Computer Engineering <span>(7)</span></a></li>
                                            <li><a href="#">Medical &amp; Health<span>(2)</span></a></li>
                                            <li><a href="#">Software <span>(1)</span></a></li>
                                            <li><a href="#">Web Development <span>(3)</span></a></li>
                                            <li><a href="#">Uncategorized <span>(9)</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Widget  -->
                            <!-- Start Single Widget  -->
                            <div class="edu-blog-widget widget-action">
                                <div class="inner">
                                    <h4 class="title">Get Online Courses From <span>EduBlink</span></h4>
                                    <span class="shape-line"><i class="icon-19"></i></span>
                                    <p>Nostrud exer ciation laboris aliqup</p>
                                    <a href="#" class="edu-btn btn-medium">Start Now <i class="icon-4"></i></a>
                                </div>
                            </div>
                            <!-- End Single Widget  -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=        Footer Area Start          =-->
        <!--=====================================-->
        @include('pages.common.footer')
