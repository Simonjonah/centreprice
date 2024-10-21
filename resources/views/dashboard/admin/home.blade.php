@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if(Auth::guard('admin')->user()->status == null)
        <h2>Please wait for Approval</h2>
      @elseif(Auth::guard('admin')->user()->status == 'suspend')
      <h2>You have been suspended</h2>
    @elseif (Auth::guard('admin')->user()->status == 'approved' && Auth::guard('admin')->user()->role == '2')

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Subscriptions</span>
                <span class="info-box-number">{{ $countsub }}</span>
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
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">{{ $countsales }}</span>
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
                <span class="info-box-number">{{ $countvendor }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Distributors</span>
                <span class="info-box-number">{{ $countdistributor }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

         
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Transportation</span>
                <span class="info-box-number">{{ $countransport }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-plus"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Team</span>
                <span class="info-box-number">{{ $countteam }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         

        </div>
        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Distributors</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger"> Distributors</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    @foreach ($display_distributors as $display_distributor)
                    <li>
                      <img src="{{ URL::asset("/public/../$display_distributor->images")}}" alt="User Image">
                      <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$display_distributor->ref_no) }}">{{ $display_distributor->fname }} {{ $display_distributor->lname }}</a>
                      <span class="users-list-date">{{ $display_distributor->created_at->diffForHumans() }}</span>
                    </li>
                    @endforeach
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{ url('admin/viewdistributorsadmin') }}">View All Distributors</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!--/.card -->
            


               <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Vendors</h3>

                <div class="card-tools">
                  <span class="badge badge-danger"> Vendors</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  @foreach ($display_vendors as $display_vendor)
                  <li>
                    <img src="{{ URL::asset("/public/../$display_vendor->images")}}" alt="User Image">
                    <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$display_vendor->ref_no) }}">{{ $display_vendor->fname }} {{ $display_vendor->lname }}</a>
                    <span class="users-list-date">{{ $display_vendor->created_at->diffForHumans() }}</span>
                  </li>
                  @endforeach
                  
                  
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewvendorsadmin') }}">View All Vendors</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!--/.card -->
          



            
            <div class="row">
             

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Teams</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Teams</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($view_teams as $view_team)
                      <li>
                        <img src="{{ URL::asset("/public/../$view_team->images")}}" alt="User Image">
                        <a class="users-list-name" href="#">{{ $view_team->fname }} {{ $view_team->lname }}</a>
                        <span class="users-list-date">{{ $view_team->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                     
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('admin/viewteam') }}">View All Teams</a>
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
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Payment Status</th>
                      <th>Amount</th>
                      <th>Product Status</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($view_sales as $view_sale)
                      <tr>
                        <td><a href="{{ url('admin/viewsingleorderadmin/'.$view_sale->ref_no) }}">{{ $view_sale->ref_no }}</a></td>
                        <td>{{ $view_sale->productname }}</td>
                        <td>{{ $view_sale->quantity }}</td>
                        <td>@if ($view_sale->status == 'success')
                          <span class="badge badge-success">Success</span>
                        
                          @elseif ($view_sale->status == 'pending')
                          <span class="badge badge-warning">Payment Pending</span>
                          @else
                          
                        @endif</td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">₦ {{ $view_sale->amount}}</div>
                        </td>
                        <td>@if ($view_sale->productstatus == null)
                          <span class="badge badge-info">Pending</span>
                        
                          @elseif ($view_sale->productstatus == 'received')
                          <span class="badge badge-success">Received</span>
                          @else
                          <span class="badge badge-dark">Delivered</span>
                        @endif</td>
                        <td>{{ $view_sale->created_at->format('D m,Y, h:a') }}</td>
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
                <a href="{{ url('admin/vieworders') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unpaid Products</span>
                <span class="info-box-number">{{ $countunpaidproduct }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Paid Products</span>
                <span class="info-box-number">{{ $countsalesuccess }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Registration Failed</span>
                <span class="info-box-number">{{ $failreg }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Testimony</span>
                <span class="info-box-number">{{ $countestimony }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Withdrawals</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Simon Udo</td>
                        <td>N5000</td>
                        <td>Success</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                
                </ul>
              </div>
              <!-- /.footer -->
            </div>
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
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
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($view_products as $view_product)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$view_product->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="{{ url('admin/viewsingleproduct/'.$view_product->ref_no) }}" class="product-title">{{ $view_product->subcategory->category->root['rootname'] }}
                        <span class="badge badge-warning float-right">N {{ $view_product->amount }}</span></a>
                      <span class="product-description">
                        <b style="color: red">{{ $view_product->subcategory->category['category'] }}</b> {{ $view_product->subcategory['subcategory'] }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewproducts') }}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Adverts</h3>

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
                  @foreach ($view_adverts as $view_advert)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$view_advert->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="{{ url('admin/viewsingleadverts/'.$view_advert->ref_no) }}" class="product-title">{{ $view_advert->company_name }}
                        <span class="badge badge-warning float-right"> {{ $view_advert->title }}</span></a>
                      <span class="product-description">
                        <b style="color: red">{{ $view_advert->phone }}</b> {{ $view_product->email }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewadvertments') }}" class="uppercase">View All Adverts</a>
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
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


  @elseif (Auth::guard('admin')->user()->status == 'approved' && Auth::guard('admin')->user()->role == '2')

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Subscriptions</span>
                <span class="info-box-number">{{ $countsub }}</span>
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
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">{{ $countsales }}</span>
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
                <span class="info-box-number">{{ $countvendor }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Distributors</span>
                <span class="info-box-number">{{ $countdistributor }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

         
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Transportation</span>
                <span class="info-box-number">{{ $countransport }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-plus"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Team</span>
                <span class="info-box-number">{{ $countteam }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         

        </div>
        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Distributors</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger"> Distributors</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    @foreach ($display_distributors as $display_distributor)
                    <li>
                      <img src="{{ URL::asset("/public/../$display_distributor->images")}}" alt="User Image">
                      <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$display_distributor->ref_no) }}">{{ $display_distributor->fname }} {{ $display_distributor->lname }}</a>
                      <span class="users-list-date">{{ $display_distributor->created_at->diffForHumans() }}</span>
                    </li>
                    @endforeach
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{ url('admin/viewdistributorsadmin') }}">View All Distributors</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!--/.card -->
            


               <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Vendors</h3>

                <div class="card-tools">
                  <span class="badge badge-danger"> Vendors</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  @foreach ($display_vendors as $display_vendor)
                  <li>
                    <img src="{{ URL::asset("/public/../$display_vendor->images")}}" alt="User Image">
                    <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$display_vendor->ref_no) }}">{{ $display_vendor->fname }} {{ $display_vendor->lname }}</a>
                    <span class="users-list-date">{{ $display_vendor->created_at->diffForHumans() }}</span>
                  </li>
                  @endforeach
                  
                  
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewvendorsadmin') }}">View All Vendors</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!--/.card -->
          



            
            <div class="row">
             

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Teams</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Teams</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($view_teams as $view_team)
                      <li>
                        <img src="{{ URL::asset("/public/../$view_team->images")}}" alt="User Image">
                        <a class="users-list-name" href="#">{{ $view_team->fname }} {{ $view_team->lname }}</a>
                        <span class="users-list-date">{{ $view_team->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                     
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('admin/viewteam') }}">View All Teams</a>
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
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Payment Status</th>
                      <th>Amount</th>
                      <th>Product Status</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($view_sales as $view_sale)
                      <tr>
                        <td><a href="{{ url('admin/viewsingleorderadmin/'.$view_sale->ref_no) }}">{{ $view_sale->ref_no }}</a></td>
                        <td>{{ $view_sale->productname }}</td>
                        <td>{{ $view_sale->quantity }}</td>
                        <td>@if ($view_sale->status == 'success')
                          <span class="badge badge-success">Success</span>
                        
                          @elseif ($view_sale->status == 'pending')
                          <span class="badge badge-warning">Payment Pending</span>
                          @else
                          
                        @endif</td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">₦ {{ $view_sale->amount}}</div>
                        </td>
                        <td>@if ($view_sale->productstatus == null)
                          <span class="badge badge-info">Pending</span>
                        
                          @elseif ($view_sale->productstatus == 'received')
                          <span class="badge badge-success">Received</span>
                          @else
                          <span class="badge badge-dark">Delivered</span>
                        @endif</td>
                        <td>{{ $view_sale->created_at->format('D m,Y, h:a') }}</td>
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
                <a href="{{ url('admin/vieworders') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unpaid Products</span>
                <span class="info-box-number">{{ $countunpaidproduct }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Paid Products</span>
                <span class="info-box-number">{{ $countsalesuccess }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Registration Failed</span>
                <span class="info-box-number">{{ $failreg }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Testimony</span>
                <span class="info-box-number">{{ $countestimony }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Withdrawals</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Simon Udo</td>
                        <td>N5000</td>
                        <td>Success</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                
                </ul>
              </div>
              <!-- /.footer -->
            </div>
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
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
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($view_products as $view_product)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$view_product->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="{{ url('admin/viewsingleproduct/'.$view_product->ref_no) }}" class="product-title">{{ $view_product->subcategory->category->root['rootname'] }}
                        <span class="badge badge-warning float-right">N {{ $view_product->amount }}</span></a>
                      <span class="product-description">
                        <b style="color: red">{{ $view_product->subcategory->category['category'] }}</b> {{ $view_product->subcategory['subcategory'] }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewproducts') }}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Adverts</h3>

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
                  @foreach ($view_adverts as $view_advert)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$view_advert->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="{{ url('admin/viewsingleadverts/'.$view_advert->ref_no) }}" class="product-title">{{ $view_advert->company_name }}
                        <span class="badge badge-warning float-right"> {{ $view_advert->title }}</span></a>
                      <span class="product-description">
                        <b style="color: red">{{ $view_advert->phone }}</b> {{ $view_product->email }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewadvertments') }}" class="uppercase">View All Adverts</a>
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
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @elseif (Auth::guard('admin')->user()->status == 'approved' && Auth::guard('admin')->user()->role == '3')

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">LGA</span>
              <span class="info-box-number">
                {{ $countlga }}
              </span>
            </div>
            
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cog"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">State</span>
              <span class="info-box-number">
                {{ $countstate }}
              </span>
            </div>
            
          </div>
          <!-- /.info-box -->
        </div>

        
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-cog"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Districts</span>
              <span class="info-box-number">
                {{ $countdistrict }}
              </span>
            </div>
            
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Roots</span>
              <span class="info-box-number">{{ $countroot }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categories</span>
              <span class="info-box-number">{{ $countcategory }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Subcategories</span>
              <span class="info-box-number">{{ $countsubcategory }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-secondary"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Products</span>
              <span class="info-box-number">{{ $countproduct }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Available Produts</span>
              <span class="info-box-number">no</span>
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
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">{{ $countsales }}</span>
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
              <span class="info-box-text">Unavailable Products</span>
              <span class="info-box-number">no</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


       
        <!-- /.col -->


        

         



        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Transportation</span>
              <span class="info-box-number">{{ $countransport }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        



      </div>
      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
         
          <div class="row">
           

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Teams</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger">Teams</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    @foreach ($view_teams as $view_team)
                    <li>
                      <img src="{{ URL::asset("/public/../$view_team->images")}}" alt="User Image">
                      <a class="users-list-name" href="#">{{ $view_team->fname }} {{ $view_team->lname }}</a>
                      <span class="users-list-date">{{ $view_team->created_at->diffForHumans() }}</span>
                    </li>
                    @endforeach
                   
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{ url('admin/viewteam') }}">View All Teams</a>
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
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Payment Status</th>
                    <th>Amount</th>
                    <th>Product Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($view_sales as $view_sale)
                    <tr>
                      <td><a href="{{ url('admin/viewsingleorderadmin/'.$view_sale->ref_no) }}">{{ $view_sale->ref_no }}</a></td>
                      <td>{{ $view_sale->productname }}</td>
                      <td>{{ $view_sale->quantity }}</td>
                      <td>@if ($view_sale->status == 'success')
                        <span class="badge badge-success">Success</span>
                      
                        @elseif ($view_sale->status == 'pending')
                        <span class="badge badge-warning">Payment Pending</span>
                        @else
                        
                      @endif</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">₦ {{ $view_sale->amount}}</div>
                      </td>
                      <td>@if ($view_sale->productstatus == null)
                        <span class="badge badge-info">Pending</span>
                      
                        @elseif ($view_sale->productstatus == 'received')
                        <span class="badge badge-success">Received</span>
                        @else
                        <span class="badge badge-dark">Delivered</span>
                      @endif</td>
                      <td>{{ $view_sale->created_at->format('D m,Y, h:a') }}</td>
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
              <a href="{{ url('admin/vieworders') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Unpaid Products</span>
              <span class="info-box-number">{{ $countunpaidproduct }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Paid Products</span>
              <span class="info-box-number">{{ $countsalesuccess }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registration Failed</span>
              <span class="info-box-number">{{ $failreg }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-comment"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Testimony</span>
              <span class="info-box-number">{{ $countestimony }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          

          <!-- PRODUCT LIST -->
          <div class="card">
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
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($view_products as $view_product)
                <li class="item">
                  <div class="product-img">
                    <img src="{{ URL::asset("/public/../$view_product->images1")}}" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="{{ url('admin/viewsingleproduct/'.$view_product->ref_no) }}" class="product-title">{{ $view_product->subcategory->category->root['rootname'] }}
                      <span class="badge badge-warning float-right">N {{ $view_product->amount }}</span></a>
                    <span class="product-description">
                      <b style="color: red">{{ $view_product->subcategory->category['category'] }}</b> {{ $view_product->subcategory['subcategory'] }}
                    </span>
                  </div>
                </li>
                @endforeach
                
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="{{ url('admin/viewproducts') }}" class="uppercase">View All Products</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->



          <!-- PRODUCT LIST -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recently Added Adverts</h3>

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
                @foreach ($view_adverts as $view_advert)
                <li class="item">
                  <div class="product-img">
                    <img src="{{ URL::asset("/public/../$view_advert->images1")}}" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="{{ url('admin/viewsingleadverts/'.$view_advert->ref_no) }}" class="product-title">{{ $view_advert->company_name }}
                      <span class="badge badge-warning float-right"> {{ $view_advert->title }}</span></a>
                    <span class="product-description">
                      <b style="color: red">{{ $view_advert->phone }}</b> {{ $view_product->email }}
                    </span>
                  </div>
                </li>
                @endforeach
                
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="{{ url('admin/viewadvertments') }}" class="uppercase">View All Adverts</a>
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
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->



  @endif


  

  @include('dashboard.admin.footer')