@include('pages.common.header')

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Services</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
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
        <!--=           Cart Area Start         =-->
        <!--=====================================-->
        <section class="privacy-policy-area terms-condition-area">
            <div class="container">
                <div class="row row--30">
                    <div class="col-lg-8">
                        <img src="{{ asset('front/assets/images/bg/serv.jpeg') }}" alt="">
                        <div class="privacy-policy terms-condition">
                            <div class="text-block">
                                <h3 class="title" style="margin-top: 20px">Our Services</h3>
                                <p>Our primary services are that we produce what we consume and consume what we produce while we present it as an opportunity for the general public to join the Cooperative - Thamvos Products Manufacturers Multipurpose Cooperative Society Limited                                </p>
                            
                                <p>Thamvos launches you into a successful entrepreneurial journey on a life time investment for a trans-generational dividend with minimal capital
                                Opportunity to join awaits you via our Annual Entrepreneurial Empowerment Campaign on our e-commerce platform: <a href="www.centerprices.com ">www.centerprices.com </a>
                                </p>
                                {{-- <p>Are you ready to take control of your financial future 
                                </p>
                                <p>Are you worried about what business you can venture into</p>
                            <p>Are you looking to have multiple streams of income.
                            </p>
                            <p>Thinking of earnings beyond your retirement </p>

                                <p>Are you looking for capital to start up a new business </p>
                                
                                <p>We are here for you. </p>
                                <p>Have access to our cutting edge products at amazing prices always</p>

                                <p>You can become a Thamvos Entrepreneur too and have multiple streams of income with awesome referral benefits like no other</p> --}}
                            </div>
                            <div class="text-block">
                                <h4 class="title">Here’s How It Works:</h4>
                                <ul>
                                    <li><b>Join the Membership:</b> Sign up as a distributor and gain access to a wide range of high-quality products across various categories <a style="color: green" href="{{ url('becomemembers') }}">(see Membership page for details)</a>.</li>
                                    <li><b>Build Your Cluster:</b>Recruit vendors and retail stores to join your network, expanding your reach and earning potential <a style="color: green" href="{{ url('becomemembers') }}">(learn more about cluster building on the Membership page).</a></li>
                                    <li><b>Earn Through Multiple Channels:</b> Generate income through product sales, vendor recruitment, and commissions on wellness solutions <a style="color: green" href="{{ url('becomemembers') }}">(see Membership page for full details on earning potential).</a></li>
                                    
                                </ul>
                            </div>
                            <div class="text-block">
                                <h4 class="title">Our Product Categories</h4>
                                <ul>
                                    @foreach ($view_roots as $view_root)
                                        <li><a href="{{ url('viewrootproducts/'.$view_root->id) }}">{{ $view_root->rootname }}</a></li>
                                    @endforeach
                                </ul>
                            </div>


                            {{-- <div class="text-block">
                                <h4 class="title">The Benefits of Membership</h4>
                                <ul>
                                    <li><b>Low Startup Costs:</b> Begin your entrepreneurial journey without a significant financial burden <a style="color: green" href="{{ url('becomemember') }}">(details on membership fees on Membership page)</a>.</li>
                                    <li><b>Unlimited Earning Potential:</b> Your income grows with the expansion of your network <a style="color: green" href="{{ url('becomemember') }}">(details on membership fees on Membership page)</a></li>
                                    <li><b>Unlimited Earning Potential:</b> Your income grows with the expansion of your network <a style="color: green" href="{{ url('becomemember') }}">(details on membership fees on Membership page)</a></li>
                                    <li><b>Ongoing Support: </b>Receive comprehensive training, guidance, and mentorship from our team <a style="color: green" href="{{ url('becomemember') }}">(details on membership fees on Membership page)</a>.</li>
                                    <li><b>Be Your Own Boss:</b>Enjoy the freedom and flexibility of running your own business <a style="color: green" href="{{ url('becomemember') }}">(details on membership fees on Membership page)</a>.</li>
                                </ul>
                            </div>

                            <div class="text-block">
                                <h4 class="title">Join the CSCC Community Today!</h4>
                                <ul>
                                    <li>Empower yourself to achieve financial freedom and build a lasting legacy. <a style="color: green" href="{{ url('register') }}">Sign up</a> for a membership and unlock a world of opportunity. <a style="color: green" href="{{ url('register') }}">Visit the Membership Registration Page here.</a></li>
                                    
                                </ul>
                            </div>--}}
                        </div>
                     
                </div>
                    <div class="col-lg-4">
                        <div class="edu-blog-sidebar">
                           
                            
                            <div class="edu-blog-widget widget-categories">
                                <div class="inner">
                                    <h4 class="widget-title">Product Categories</h4>
                                    <div class="content">
                                        <ul class="category-list">
                                            @foreach ($view_roots as $view_root)
                                                <li><a href="{{ url('viewrootproducts/'.$view_root->id) }}">{{ $view_root->rootname }} </span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
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
