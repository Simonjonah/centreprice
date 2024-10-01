
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Gallery</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/updateproduct/'.$view_product->slug) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif

                  <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select SubCategory</label>
                        <select name="subcategory_id" class="form-control select2" style="width: 100%;">
                          <option value="{{ $view_product->subcategory['id'] }}">{{ $view_product->subcategory['subcategory'] }}</option>
                          @foreach ($view_subcategories as $view_subcategorie)
                            <option value="{{ $view_subcategorie->id }}">{{ $view_subcategorie->subcategory }}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      @error('subcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <!-- /.form-group -->
                     
                      <div class="form-group">
                        <label for="">Quantity</label>
                        <input name="quantity" type="number" @error('quantity') is-invalid @enderror"
                        value="{{ $view_product->quantity }}" class="form-control" id="" placeholder="Quantity">
                    </div>
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
        

                    <div class="form-group">
                      <textarea name="body" id="compose-textarea" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control" style="height: 300px">
                      {{ $view_product->subcategory['body'] }}
                      </textarea>
                  </div>
                  @error('body')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                    
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Amount</label>
                        <input name="amount" type="number" @error('amount') is-invalid @enderror"
                        value="{{ $view_product->amount }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->
                   
                      <div class="form-group">
                        <label for="">Percent</label>
                        <input name="percent" type="number" @error('percent') is-invalid @enderror"
                        value="{{ $view_product->percent }}" class="form-control" id="" placeholder="Percent">
                    </div>
                    @error('percent')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">package_no</label>
                      <input name="package_no" type="number" @error('package_no') is-invalid @enderror"
                      value="{{ $view_product->package_no }}" class="form-control" id="" placeholder="package_no">
                  </div>
                  @error('package_no')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                    {{-- <div class="form-group">
                      <label for="">Franchise Commission</label>
                      <input name="franchise_commission" type="number" @error('franchise_commission') is-invalid @enderror"
                      value="{{ $view_product->franchise_commission }}" class="form-control" id="" placeholder="franchise_commission">
                  </div>
                  @error('franchise_commission')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror --}}

                  <div class="form-group">
                    <label for="">Package</label>
                    <select name="package" class="form-control">
                      <option value="{{ $view_product->package }}">{{ $view_product->package }}</option>
                      <option value="Cattons">Cattons</option>
                      <option value="Half Catton">Half Catton</option>
                      <option value="Cretes">Cretes</option>
                    </select>
                </div>
                @error('package')
                    <span class="text-danger">{{ $message }}</span>
                @enderror



                  <div class="form-group">
                    <label for="">Distributor Commission</label>
                    <input name="distributors_commission" type="number" @error('distributors_commission') is-invalid @enderror"
                    value="{{ $view_product->distributors_commission }}" class="form-control" id="" placeholder="distributors_commission">
                </div>
                @error('distributors_commission')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                  <label for="">Vendor Commission</label>
                  <input name="vendors_commission" type="number" @error('vendors_commission') is-invalid @enderror"
                  value="{{ $view_product->vendors_commission }}" class="form-control" id="" placeholder="vendors_commission">
              </div>
              @error('vendors_commission')
                  <span class="text-danger">{{ $message }}</span>
              @enderror

                      <!-- /.form-group -->
                      <div class="form-group">
                        <td><img style="width: auto; height: 30px;" src="{{ asset('/public/../'.$view_product->images1)}}" alt=""></td>

                        <label for="">Image</label>
                        <input name="images1" type="file" @error('images1') is-invalid @enderror"
                        value="{{ old('images1') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Product Photos
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_product->images1)}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_product->images1)}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>

                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_product->images2)}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_product->images2)}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>

                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_product->images2)}}" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_product->images2)}}" class="img-fluid mb-2" alt="black sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_product->images3)}}" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_product->images3)}}" class="img-fluid mb-2" alt="red sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_product->images4)}}" data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_product->images4)}}" class="img-fluid mb-2" alt="red sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_product->images5)}}" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_product->images5)}}" class="img-fluid mb-2" alt="black sample"/>
                    </a>
                  </div>

                </div>
              </div>

              </form>
            </div>



            

          </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- /.content -->
  </div>

  
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Filterizr-->
<script src="{{ asset('assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>