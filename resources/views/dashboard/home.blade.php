@include('dashboard.header')

@include('dashboard.sidebar')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            @if (Auth::guard('web')->user()->role == '1')
            <h4 class="m-0 text-dark"><a href="{{ url('registerdistributor/'.Auth::guard('web')->user()->ref_no) }}">{{ Auth::user()->referral_link }}</a></h4>
            @elseif (Auth::guard('web')->user()->role == '3')
            <h4 class="m-0 text-dark"><a href="{{ url('referregistervendor/'.Auth::guard('web')->user()->ref_no3) }}">{{ Auth::user()->vendorreferral_link }}</a></h4>
            @else

            @endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @php
        use App\Models\Plan;
        $view_subscriptions = Plan::all();
        // $view_subscriptions = Subscription::where('user_id', auth()->user()->id)->get();
    @endphp
@if(Auth::guard('web')->user()->status == null)
 @foreach ($view_subscriptions as $view_subscription)
 @if ($view_subscription->user_type == 'Franchise')
 <h2>
  <h1>Franchise Subscription Fee ₦{{ $view_subscription->amount  }}   @if (Auth::user()->user_type == 'Franchise')
   
 @elseif (Auth::user()->user_type == 'Distributor')
 Distributor
 @else
 Vendor
 @endif</h1>
  
  <form method="POST" action="{{ url('buy') }}" id="paymentForm">
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
      {{ csrf_field() }}
  
      <input name="amount" type="hidden" value="{{ $view_subscription->amount  }}" placeholder="Name" />
      <input name="email" type="hidden" value="{{ Auth::user()->email  }}" placeholder="Your Email" />
      <input name="fname" type="hidden" value="{{ Auth::user()->fname  }}" placeholder="Your Email" />
      <input name="lname" type="hidden" value="{{ Auth::user()->lname  }}" placeholder="Your Email" />
      <input name="user_id" type="hidden" value="{{ Auth::user()->id  }}" placeholder="Your Email" />
       @if (Auth::user()->role == '1')
         <input name="user_type" type="hidden" value="Franchise" placeholder="Your Email" />
       @elseif (Auth::user()->role == '2')
         <input name="user_type" type="hidden" value="Distributor" placeholder="Your Email" />
       @else
         <input name="user_type" type="hidden" value="Vendor" placeholder="Your Email" />
       @endif
      <input name="phone" type="hidden" value="{{ Auth::user()->phone  }}" placeholder="Phone number" />
      <input name="plan_id" type="hidden" value="{{ $view_subscription->id  }}" placeholder="Phone number" />
  
      <input type="submit" class="btn btn-primary" value="Subscribe" />
  </form>
  {{-- <a href="{{ url('pay') }}">{{ $view_subscription->user_type  }} Subscription Fee ₦{{ $view_subscription->amount  }}</a></h2> --}}
 @else
   
 @endif
  @endforeach



  @elseif(Auth::guard('web')->user()->status == 'suspend')
  <h2>You have suspended </h2>
  
@elseif (Auth::guard('web')->user()->status == 'success' && Auth::guard('web')->user()->user_type == 'Franchise')

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Earning</span>
                <span class="info-box-number">
                  ₦ {{ $franchise_earnings }}
                </span>
              </div>
            </div>
            
          </div>

          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Withdrawal</span>
                <span class="info-box-number">₦0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">No of Sales</span>
                <span class="info-box-number">₦ {{ $franchise_sales }}</span>
              </div>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Quantity Sales</span>
                <span class="info-box-number">₦ {{ $franchise_salesquantity }}</span>
              </div>
            </div>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved Products</span>
                <span class="info-box-number">{{ $approvedproducts }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Distributors</span>
                <span class="info-box-number">{{ $countfrancesedistributors }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
              
            </div>
            <!-- /.card -->
            <div class="row">
              

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Distributors</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">{{ $countfrancesedistributors }} New Distributors</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($viewmyfrancesedistributors as $viewmyfrancesedistributor)
                      <li>
                        <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.$viewmyfrancesedistributor->images)}}" alt="User Image">
                        <a class="users-list-name" href="{{ url('web/mydistributors') }}">{{ $viewmyfrancesedistributor->fname }}, {{ $viewmyfrancesedistributor->lname }}</a>
                        <span class="users-list-date">{{ $viewmyfrancesedistributor->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('web/mydistributors') }}">View All Distributors</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Product Sign-up</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      @foreach ($view_latestproductssignup as $view_latestproductssignu)
                      <td><a href="pages/examples/invoice.html">{{ $view_latestproductssignu->ref_no }}</a></td>
                      <td>{{ $view_latestproductssignu->user['fname'] }} {{ $view_latestproductssignu->user['lname'] }}</td>
                      <td>{{ $view_latestproductssignu->subcategory['subcategory'] }}</td>
                      <td>{{ $view_latestproductssignu->quantityordered }}</td>
                      <td>@if ($view_latestproductssignu->status == null )
                        <span class="badge badge-secondary">Unapproved</span>
                        @elseif ($view_latestproductssignu->status == 'suspend')
                        <span class="badge badge-warning">Suspended</span>
                        @elseif ($view_latestproductssignu->status == 'delivered')
                        <span class="badge badge-success">Delivered</span>

                      @else
                      <span class="badge badge-success">None</span>
                        
                      @endif</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"> ₦ {{ $view_latestproductssignu->amountordered }}</div>
                      </td>
                      @endforeach
                      
                    </tr>
                    {{-- <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-info">Processing</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr> --}}
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <a href="{{ url('web/myproductliners') }}" class="btn btn-sm btn-info float-left">View All</a> --}}
                <a href="{{ url('web/myproductliners') }}" class="btn btn-sm btn-success float-right">View All </a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
           
            

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Purchase Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($franchise_products as $franchise_product)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$franchise_product->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{ $franchise_product->user['fname'] }} {{ $franchise_product->user['lname'] }}
                        <span class="badge badge-warning float-right">NGN {{ $franchise_product->amount }}</span></a>
                      <span class="product-description">
                        {{ $franchise_product->quantity }} {{ $franchise_product->productname }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                 
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @elseif (Auth::guard('web')->user()->status == 'success' && Auth::guard('web')->user()->user_type == 'Distributor')
          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Earnings</span>
                <span class="info-box-number">
                  ₦ {{ $countdistributors_ommission }}
                  {{-- <small>N</small> --}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Fund Wallet</span>
                <span class="info-box-number">₦ 0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">No of Ordered Products</span>
                <span class="info-box-number">{{ $count_orderedproducts }}</span>
              </div>
            </div>
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">No of Sales</span>
                <span class="info-box-number">{{ $count_sales }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Quantity Sales</span>
                <span class="info-box-number">{{ $count_quantitysales }}</span>
              </div>
            </div>
          </div>

          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Withdrawal</span>
                <span class="info-box-number">₦ 0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
          
            <!-- /.card -->
            <div class="row">
             

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Ordered Products</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Latest Ordered Products</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($view_orderedproducts as $view_orderedproduct)
                      <li>
                        <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.$view_orderedproduct->images1)}}" alt="User Image">
                        <a class="users-list-name" href="#">{{ $view_orderedproduct->subcategory['subcategory'] }}</a>
                        <span class="users-list-date">{{ $view_orderedproduct->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                      
                     
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('web/myorderproducts') }}">View All Product</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Income</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Products</th>
                      <th>Payment Status</th>
                      <th>Qty</th>
                      <th>Amount</th>
                      <th>Products Status</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($view_distributorsales as $view_distributorsale)
                      <tr>
                        <td><a href="pages/examples/invoice.html">{{ $view_distributorsale->product['ref_no'] }}</a></td>
                        <td>{{ $view_distributorsale->productname }}</td>
                        <td>
                          @if ($view_distributorsale->status == 'pending')
                            <span class="badge badge-secondary">Payment Pending</span>
                            @elseif ($view_distributorsale->status == 'failed')
                          
                            <span class="badge badge-warning">Payment Failed</span>

                            @elseif ($view_distributorsale->status == 'received')
                            <span class="badge badge-primary">Product Received</span>

                            @elseif ($view_distributorsale->status == 'delivered')
                            <span class="badge badge-success">Product Delivered</span>
                            @elseif ($view_distributorsale->status == 'shipping')
                            <span class="badge badge-dark">Shipping</span>

                            @elseif ($view_distributorsale->status == 'success')
                            <span class="badge badge-info">Paid</span>
                          @endif
                        </td>
                        <td>{{ $view_distributorsale->quantity }}</td>

                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">NGN {{ $view_distributorsale->amount }}</div>
                        </td>

                        <td>
                          @if ($view_distributorsale->productstatus == 'received')
                            <span class="badge badge-secondary">Received</span>
                            @elseif ($view_distributorsale->productstatus == 'delivered')
                          
                            <span class="badge badge-success">Delivered</span>

                            @elseif ($view_distributorsale->productstatus == 'shipping')
                            <span class="badge badge-dark">Shipping</span>

                            @elseif ($view_distributorsale->productstatus == null)
                            <span class="badge badge-dark">Pending</span>

                          @endif
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                <a href="{{ url('web/viewmypurchasesdist') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            
            
            

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Buyers</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($view_distributorsales as $view_distributorsale)
                <li class="item">
                  <div class="product-img">
                    <img src="{{ URL::asset("/public/../$view_distributorsale->images1")}}" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">{{ $view_distributorsale->user['fname'] }} {{ $view_distributorsale->user['lname'] }}
                      <span class="badge badge-warning float-right">NGN {{ $view_distributorsale->amount }}</span></a>
                    <span class="product-description">
                      {{ $view_distributorsale->quantity }}{{ $view_distributorsale->productname }}
                    </span>
                  </div>
                </li>
                @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('web/viewmypurchasesdist') }}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


    @elseif (Auth::guard('web')->user()->status == 'success' && Auth::guard('web')->user()->user_type == 'Vendor')
          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Earning</span>
                <span class="info-box-number">
                  NGN {{ $countvendorsommission }} 
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Fund Wallet</span>
                <span class="info-box-number"> NGN 0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <style>
            .rangecolo{
              accent-color: #fff;
            }

             /* For Firefox */
          .rangecolo[type="range"]::-moz-range-track {
              background: green;
              height: 0.5rem;
          }

          /* For Chrome, Safari, Opera, and Edge  */
          .rangecolo[type="range"]::-webkit-slider-runnable-track {
              background: green;
              /* height: 0.5rem; */
          }

          .sapphirecolo{
              accent-color: #fff;
            }

             /* For Firefox */
          .sapphirecolo[type="range"]::-moz-range-track {
              background: brown;
              height: 0.5rem;
          }

          /* For Chrome, Safari, Opera, and Edge  */
          .sapphirecolo[type="range"]::-webkit-slider-runnable-track {
              background: brown;
              /* height: 0.5rem; */
          }

         


          
          </style>
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">{{ $countsales }}
                  @if ($countsales <= '1000')
                  Ruby:
                  <input  type="range" class="rangecolo" max="1000000000" value="{{ $countsales }}"></span>
                  @elseif ($countsales >= '10000')
                  Sapphire:
                  <input type="range" class="sapphirecolo" max="1000000000" value="{{ $countsales }}"></span>
                  @elseif ($countsales >= '100000')
                  Topaz:
                  <input type="range" max="1000000000" value="{{ $countsales }}"></span>
                  @elseif ($countsales >= '10000000')
                  Gold:
                  <input type="range" max="1000000000" value="{{ $countsales }}"></span>

                  @elseif ($countsales >= '10000000')
                  Platinum:
                  <input type="range" max="1000000000" value="{{ $countsales }}"></span>

                  @elseif ($countsales >= '100000000')
                  Diamond:
                  <input type="range" max="1000000000" value="{{ $countsales }}"></span>

                  @elseif ($countsales >= '1000000000')
                  Crown Diamond
                  <input type="range" max="1000000000" value="{{ $countsales }}"></span>

                  @else
                  1 Generation
                  @endif
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Cost</span>
                <span class="info-box-number">{{ $countgoodsbought }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Withdrawal</span>
                <span class="info-box-number">NGN 0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vendors</span>
                <span class="info-box-number">{{ $countsubvendors }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
          
            <!-- /.card -->
            <div class="row">
             

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Vendors</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">{{ $countsubvendors }} New Vendors</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($viewsubvendors as $viewsubvendor)
                      <li>
                        <img style="width: 100px; height: 100px;" src="{{ asset('/public/../'.$viewsubvendor->images)}}" alt="User Image">
                        <a class="users-list-name" href="{{ url('web/mydistributors') }}">{{ $viewsubvendor->fname }}, {{ $viewsubvendor->lname }}</a>
                        <span class="users-list-date">{{ $viewsubvendor->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                      


                     
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('web/myvendorsbyvendors') }}">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Products</th>
                      <th>Payment Status</th>
                      <th>Qty</th>
                      <th>Amount</th>
                      <th>Products Status</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($viewvendororders as $viewvendororder)
                      <tr>
                        <td><a href="pages/examples/invoice.html">{{ $viewvendororder->product['ref_no'] }}</a></td>
                        <td>{{ $viewvendororder->productname }}</td>
                        <td>
                          @if ($viewvendororder->status == 'pending')
                            <span class="badge badge-secondary">Payment Pending</span>
                            @elseif ($viewvendororder->status == 'failed')
                          
                            <span class="badge badge-warning">Payment Failed</span>

                            @elseif ($viewvendororder->status == 'received')
                            <span class="badge badge-primary">Product Received</span>

                            @elseif ($viewvendororder->status == 'delivered')
                            <span class="badge badge-success">Product Delivered</span>
                            @elseif ($viewvendororder->status == 'shipping')
                            <span class="badge badge-dark">Shipping</span>

                            @elseif ($viewvendororder->status == 'success')
                            <span class="badge badge-info">Paid</span>
                          @endif
                        </td>
                        <td>{{ $viewvendororder->quantity }}</td>

                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">NGN {{ $viewvendororder->amount }}</div>
                        </td>

                        <td>
                          @if ($viewvendororder->productstatus == 'received')
                            <span class="badge badge-secondary">Received</span>
                            @elseif ($viewvendororder->productstatus == 'delivered')
                          
                            <span class="badge badge-success">Delivered</span>

                            @elseif ($viewvendororder->productstatus == 'shipping')
                            <span class="badge badge-dark">Shipping</span>

                            @elseif ($viewvendororder->productstatus == null)
                            <span class="badge badge-dark">Pending</span>

                          @endif
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                <a href="{{ url('web/viewmypurchases') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            
            
           
           
            <div>
            {{-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div> --}}
              <!-- /.card-header -->
              {{-- <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Samsung TV
                        <span class="badge badge-warning float-right">$1800</span></a>
                      <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                    </div>
                  </li> --}}
                  <!-- /.item -->
                  {{-- <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Bicycle
                        <span class="badge badge-info float-right">$700</span></a>
                      <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                      </span>
                    </div>
                  </li> --}}
                  <!-- /.item -->
                  {{-- <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        Xbox One <span class="badge badge-danger float-right">
                        $350
                      </span>
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li> --}}
                  <!-- /.item -->
                  {{-- <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">PlayStation 4
                        <span class="badge badge-success float-right">$399</span></a>
                      <span class="product-description">
                        PlayStation 4 500GB Console (PS4)
                      </span>
                    </div>
                  </li> 
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
            </div>--}}
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    @endif
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('dashboard.footer')