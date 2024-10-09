@include('pages.common.header')
        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Team</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Team</li>
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
        <!--=        Team Area Start       	=-->
        <!--=====================================-->
        <div class="edu-team-area team-area-2 edu-section-gap">
            <div class="container">
                
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
                                                <img style="width: 370px; height: 370px;" src="{{ URL::asset("/public/../$view_team->images")}}" alt="team images">
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
        </div>
        <!--=====================================-->
        <!--=        Footer Area Start       	=-->
        @include('pages.common.footer')