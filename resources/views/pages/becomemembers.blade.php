@include('pages.common.header')

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Become Member</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Become Member</li>
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
                        <div class="privacy-policy terms-condition">
                            <div class="text-block">
                                <h3 class="title" style="margin-top: 20px">Become a Part of the CenterPrices Supply Chain Community</h3>
                                <p>Joining CSCC is your gateway to entrepreneurial success. As a member, you’ll gain access to our comprehensive support system, cutting-edge products, and a vast network of like-minded individuals.

                                    Becoming a member also means embarking on a journey to financial freedom. As a distributor or vendor, you’ll have the opportunity to expand your product line, recruit new members, and reap the rewards of entrepreneurship.</p>
                            </div>
                            <div class="text-block">
                                <h4 class="title">Distributor Membership:</h4>
                                <ul>
                                    <li>Store, market, and sell all product lines.</li>
                                    <li>Unlimited earning potential.</li>
                                    <li>Comprehensive training and resources.</li>
                                   
                                </ul>
                            </div>
                            <div class="text-block">
                                <h4 class="title">Vendor Membership:</h4>
                                <ul>
                                    <li>Specialize in one product line.</li>
                                    <li>Flexible expansion opportunities.</li>
                                    <li>Access to our encrypted distribution system.</li>
                                </ul>
                            </div>


                            <div class="text-block">
                                <h4 class="title">Are you ready to embark on a journey to financial freedom?</h4>
                                <ul>
                                    <li><a href="{{ url('register') }}">Become a part of the CSC community today!</a></li>
                                    
                                </ul>
                            </div>

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



                            
                            <div class="edu-blog-widget widget-categories">
                                <div class="inner">
                                    <h4 class="widget-title">REGISTRATION FEES /MEMBERSHIP OPTIONS:</h4>
                                    <div class="content">
                                        <ul class="category-list">
                                            <li>Franchise = N10,000,000.00</li>
                                            <li>Distributors = N500,000.00</li>
                                            <li>Vendors = N20,000.00</li>
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

         <!--=====================================-->
        <!--=        FAQ Area Start            =-->
        <!--=====================================-->
        <section class="edu-section-gap faq-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="faq-page-nav">
                            <h3 class="title">Questions By This Category</h3>
                            <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eius mod ex tempor incididunt labore.</p>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#gn-ques" type="button" role="tab" aria-selected="true">General Questions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#rg-ques" type="button" role="tab" aria-selected="false">Regular Questions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ad-ques" type="button" role="tab" aria-selected="false">Advanced questions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#com-policy" type="button" role="tab" aria-selected="false">Company Policies</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pay-option" type="button" role="tab" aria-selected="false">Payment Options</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#terms-condition" type="button" role="tab" aria-selected="false">Terms & Conditions</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content faq-page-tab-content" id="faq-accordion">
                            <div class="tab-pane fade show active" id="gn-ques" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#question-1" aria-expanded="true">
                                                    How can I contact a school directly?
                                                </button>
                                            </h5>
                                            <div id="question-1" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-2" aria-expanded="false">
                                                    How do I find a school where I want to study?
                                                </button>
                                            </h5>
                                            <div id="question-2" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-3" aria-expanded="false">
                                                    Where should I study abroad?
                                                </button>
                                            </h5>
                                            <div id="question-3" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-4" aria-expanded="false">
                                                    Where can I find information on private companies?
                                                </button>
                                            </h5>
                                            <div id="question-4" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-5" aria-expanded="false">
                                                    How do I find a study abroad program?
                                                </button>
                                            </h5>
                                            <div id="question-5" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-6" aria-expanded="false">
                                                    Am I eligible for admission?
                                                </button>
                                            </h5>
                                            <div id="question-6" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-7" aria-expanded="false">
                                                    What kind of support does EduBlink provide?
                                                </button>
                                            </h5>
                                            <div id="question-7" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="rg-ques" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#question-8" aria-expanded="true">
                                                    Is CSCC a pyramid scheme?
                                                </button>
                                            </h5>
                                            <div id="question-8" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>How much capital is required to join?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-9" aria-expanded="false">
                                                    How do I find a school where I want to study?
                                                </button>
                                            </h5>
                                            <div id="question-9" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>CSCC offers a low-cost entry opportunity compared to traditional business models. The exact investment required depends on your chosen membership level.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-10" aria-expanded="false">
                                                    Where should I study abroad?
                                                </button>
                                            </h5>
                                            <div id="question-10" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-11" aria-expanded="false">
                                                    Where can I find information on private companies?
                                                </button>
                                            </h5>
                                            <div id="question-11" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-12" aria-expanded="false">
                                                    How do I find a study abroad program?
                                                </button>
                                            </h5>
                                            <div id="question-12" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-13" aria-expanded="false">
                                                    Am I eligible for admission?
                                                </button>
                                            </h5>
                                            <div id="question-13" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ad-ques" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#question-14" aria-expanded="true">
                                                    What does it take become an author?
                                                </button>
                                            </h5>
                                            <div id="question-14" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-15" aria-expanded="false">
                                                    How do I find a school where I want to study?
                                                </button>
                                            </h5>
                                            <div id="question-15" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-16" aria-expanded="false">
                                                    Where should I study abroad?
                                                </button>
                                            </h5>
                                            <div id="question-16" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-17" aria-expanded="false">
                                                    Where can I find information on private companies?
                                                </button>
                                            </h5>
                                            <div id="question-17" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="com-policy" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#question-18" aria-expanded="true">
                                                    How to Change my Plan using PayPal?
                                                </button>
                                            </h5>
                                            <div id="question-18" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-19" aria-expanded="false">
                                                    How do I find a school where I want to study?
                                                </button>
                                            </h5>
                                            <div id="question-19" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-20" aria-expanded="false">
                                                    Where should I study abroad?
                                                </button>
                                            </h5>
                                            <div id="question-20" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-21" aria-expanded="false">
                                                    Where can I find information on private companies?
                                                </button>
                                            </h5>
                                            <div id="question-21" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pay-option" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#question-22" aria-expanded="true">
                                                    Is There Any Prerequisites To Learn Python?
                                                </button>
                                            </h5>
                                            <div id="question-22" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-23" aria-expanded="false">
                                                    How do I find a school where I want to study?
                                                </button>
                                            </h5>
                                            <div id="question-23" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-24" aria-expanded="false">
                                                    Where should I study abroad?
                                                </button>
                                            </h5>
                                            <div id="question-24" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-25" aria-expanded="false">
                                                    Where can I find information on private companies?
                                                </button>
                                            </h5>
                                            <div id="question-25" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="terms-condition" role="tabpanel">
                                <div class="faq-accordion">
                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#question-26" aria-expanded="true">
                                                    How to Change my Plan using PayPal?
                                                </button>
                                            </h5>
                                            <div id="question-26" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-27" aria-expanded="false">
                                                    How do I find a school where I want to study?
                                                </button>
                                            </h5>
                                            <div id="question-27" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-28" aria-expanded="false">
                                                    Where should I study abroad?
                                                </button>
                                            </h5>
                                            <div id="question-28" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-29" aria-expanded="false">
                                                    Where can I find information on private companies?
                                                </button>
                                            </h5>
                                            <div id="question-29" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco qui laboris nis aliquip commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('pages.common.footer')
