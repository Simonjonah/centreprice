    @include('pages.common.header')

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Product Details</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{  url('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Details</li>
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
        <!--=      Product Details Area Start   =-->
        <!--=====================================-->
        <div class="product-details-area gap-top-equal">
            <div class="container">
                <div class="row g-5 row--25">
                    <div class="col-lg-6">
                        <div class="thumbnail">
                            <img style="width: 570px; height: 570px;" src="{{ URL::asset("/public/../$view_singleproducts->images1")}}" alt="Product Images">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <h3 class="title">{{ $view_singleproducts->subcategory['subcategory'] }}</h3>
                            
                            <div class="price">NGN {{ $view_singleproducts->amount }}</div>
                            <p>{!! $view_singleproducts->subcategory['body'] !!}</p>
                            <div class="product-action">
                                <div class="edu-quantity-btn">
                                    <div class="pro-qty"><input type="text" value="1"></div>
                                </div>
                                <div class="add-to-cart-btn">
                                    <a class="edu-btn btn-medium" href="{{ url('register') }}">Add To Cart</a>
                                    {{-- <a href="#" class="wishlist-btn"><i class="icon-22"></i></a> --}}
                                </div>
                            </div>

                            <ul class="product-feature">
                                {{-- <li><span>SKU:</span> MB-007</li> --}}
                                <li><span>Categories: </span> <a href="{{ url('categories/categoryproducts/'.$view_singleproducts->category['id']) }}">{{ $view_singleproducts->category['category'] }}</a> </li>
                                {{-- <li><span>Tag: </span> <a href="#">Business</a> <a href="#">Administration</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=====================================-->
        <div class="edu-instagram-area instagram-area-1">
            <div class="container-fluid">
                
                <div class="row g-3">
                  
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="instagram-grid">
                            <a href="{{ URL::asset("/public/../$view_singleproducts->images1")}}">
                                <img style="width: 306px; height: 306px;" src="{{ URL::asset("/public/../$view_singleproducts->images1")}}" alt="instagram">
                                <span class="user-info">
                                    <span class="icon"><i class="icon-3"></i></span>
                                    <span class="user-name">CSCC </span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="instagram-grid">
                            <a href="{{ URL::asset("/public/../$view_singleproducts->images2")}}">
                                <img style="width: 306px; height: 306px;" src="{{ URL::asset("/public/../$view_singleproducts->images1")}}" alt="instagram">
                                <span class="user-info">
                                    <span class="icon"><i class="icon-3"></i></span>
                                    <span class="user-name">CSCC </span>
                                </span>
                            </a>
                        </div>
                    </div>


                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="instagram-grid">
                            <a href="{{ URL::asset("/public/../$view_singleproducts->images3")}}">
                                <img style="width: 306px; height: 306px;" src="{{ URL::asset("/public/../$view_singleproducts->images1")}}" alt="instagram">
                                <span class="user-info">
                                    <span class="icon"><i class="icon-3"></i></span>
                                    <span class="user-name">CSCC </span>
                                </span>
                            </a>
                        </div>
                    </div>


                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="instagram-grid">
                            <a href="{{ url('register')}}">
                                <img style="width: 306px; height: 306px;" src="{{ URL::asset("/public/../$view_singleproducts->images1")}}" alt="instagram">
                                <span class="user-info">
                                    <span class="icon"><i class="icon-3"></i></span>
                                    <span class="user-name">CSCC </span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="instagram-grid">
                            <a href="{{ URL::asset("/public/../$view_singleproducts->images5")}}">
                                <img style="width: 306px; height: 306px;" src="{{ URL::asset("/public/../$view_singleproducts->images1")}}" alt="instagram">
                                <span class="user-info">
                                    <span class="icon"><i class="icon-3"></i></span>
                                    <span class="user-name">CSCC </span>
                                </span>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!--=====================================-->
        <!--=        Footer Area Start       	=-->

        <div class="edu-product-description gap-bottom-equal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="product-description-nav nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab" aria-controls="desc" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                {{-- <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews (1)</button> --}}
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="product-description-content tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                                <p>{!! $view_singleproducts->subcategory['body'] !!}</p>
                                {{-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum nemo enim ipsam voluptatem quia voluptas sit aspernatur.</p> --}}
                            </div>
                            <div class="product-description-content tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="comment-area">
                                    <h5 class="heading-title">1 Review for The King of Drugs</h5>
                                    <div class="comment-list-wrapper">
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="assets/images/blog/comment-03.jpg" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <h6 class="title">Edward Norton - <span class="date">Oct 10, 2021</span></h6>
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim est laborum. Sed perspiciatis unde omnis natus error sit voluptatem accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arch tecto beatae vitae dicta.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-form-area">
                                    <h5 class="heading-title">Be First to Add a Review</h5>
                                    <form class="comment-form">
                                        <div class="review-rating">
                                            <h6 class="title">Your Rating</h6>
                                            <div class="rating">
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                            </div>
                                        </div>
                                        <div class="row g-5">
                                            <div class="form-group col-12">
                                                <label>Your Review</label>
                                                <textarea name="comm-message" id="comm-message" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Your Name</label>
                                                <input type="text" name="comm-name" id="comm-name">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Your Email</label>
                                                <input type="email" name="comm-email" id="comm-email">
                                            </div>
                                            <div class="form-group col-12">
                                                <div class="edu-form-check">
                                                    <input type="checkbox" id="save-info">
                                                    <label for="save-info">Save my name, email, and website in this browser for the next time I comment.</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <button type="submit" class="edu-btn submit-btn">Submit Your Review <i class="icon-4"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.common.footer')
