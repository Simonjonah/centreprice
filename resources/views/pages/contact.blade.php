@include('pages.common.header')

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Contact Us</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
        <!--=       Contact Us Area Start       =-->
        <!--=====================================-->
        <section class="section-gap-equal contact-me-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="contact-me">
                            <div class="inner">
                                <div class="thumbnail">
                                    <div class="thumb">
                                        <img src="{{ asset('front/assets/images/others/contact-me.jpg') }}" alt="Contact Me">
                                    </div>
                                    <ul class="shape-group">
                                        <li class="shape-1 scene">
                                            <img data-depth="1.4" src="{{ asset('front/assets/images/about/shape-13.png') }}" alt="Shape">
                                        </li>
                                        <li class="shape-2 scene">
                                            <img data-depth="-1.4" src="{{ asset('front/assets/images/counterup/shape-02.png') }}" alt="Shape">
                                        </li>
                                        <li class="shape-3">
                                            <img src="{{ asset('front/assets/images/about/shape-07.png') }}" alt="Shape">
                                        </li>
                                    </ul>
                                </div>
                                <div class="contact-us-info">
                                    <h3 class="heading-title">Use the information Below to Contact us</h3>
                                    <ul class="address-list">
                                        <li>
                                            <h5 class="title">Address</h5>
                                            <p>B3 Shelter Afrique Shopping Complex, Mbiaobong, Uyo. Akwa Ibom State.</p>
                                        </li>
                                        <li>
                                            <h5 class="title">Email</h5>
                                            <p><a href="mailto:centerpricesng@gmail.com">centerpricesng@gmail.com</a></p>
                                        </li>
                                        <li>
                                            <h5 class="title">Phone</h5>
                                            <p><a href="tel:+2348080557395">(+234) 808-055-7395
                                            </a></p>
                                        </li>
                                    </ul>
                                    <ul class="social-share">
                                        <li><a href="#"><i class="icon-share-alt"></i></a></li>
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=      Contact Form Area Start      =-->
        <!--=====================================-->
        <section class="edu-section-gap contact-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <div class="section-title section-center">
                                <h3 class="title">Please Fill the form here</h3>
                            </div>
                            <form class="" id="contact-form" method="POST" action="{{ url('createcontact') }}">
                               @csrf
                               @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif

                                @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                                @endif

                                <div class="row row--10">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" id="contact-name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" name="email" id="contact-email" placeholder="Your Email">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="tel" name="phone" id="contact-phone" placeholder="Phone number">
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea name="message" id="contact-message" cols="30" rows="6" placeholder="Type your message"></textarea>
                                    </div>
                                    <div class="form-group col-12 text-center">
                                        <button class="rn-btn edu-btn submit-btn" name="submit" type="submit">Submit Now <i class="icon-4"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1 scene"><img data-depth="-2" src="{{ asset('front/assets/images/about/shape-15.png') }}" alt="shape"></li>
                <li class="shape-2 scene"><img data-depth="2" src="{{ asset('front/assets/images/cta/shape-04.png') }}" alt="shape"></li>
                <li class="shape-3 scene"><span data-depth="1"></span></li>
                <li class="shape-4 scene"><img data-depth="-2" src="{{ asset('front/assets/images/about/shape-13.png') }}" alt="shape"></li>
            </ul>
        </section>

       
        <!--=        Footer Area Start          =-->
        <!--=====================================-->
       @include('pages.common.footer')