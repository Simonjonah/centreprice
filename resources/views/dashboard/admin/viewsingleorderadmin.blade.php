

@include('dashboard.admin.header')
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
              <form action="{{ url('admin/updateproduct/'.$view_order->slug) }}" method="post" enctype="multipart/form-data">
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

                      {{-- <div class="form-group">
                        <label>Root</label>
                        <select name="subcategory_id" class="form-control select2" style="width: 100%;">
                          <option value="{{ $view_order->root['id'] }}">{{ $view_order->root['rootname'] }}</option>
                        </select>
                      </div>
                      @error('root_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror --}}
                      <!-- /.form-group -->

                      {{-- <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                          <option value="{{ $view_order->category['id'] }}">{{ $view_order->category['category'] }}</option>
                         
                        </select>
                      </div>
                      @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror --}}
                      <!-- /.form-group -->

                     

                     
                     
                      <div class="form-group">
                        <label for="">Quantity Odered</label>
                        <input name="quantity" type="number" @error('quantity') is-invalid @enderror"
                        value="{{ $view_order->quantity }}" class="form-control" id="" placeholder="Quantity">
                    </div>
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Amount</label>
                        <input name="amount" type="number" @error('amount') is-invalid @enderror"
                        value="{{ $view_order->amount }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    {{-- <div class="form-group">
                      <label> SubCategory</label>
                      <select name="category_id" class="form-control select2" style="width: 100%;">
                        <option value="{{ $view_order->subcategory['id'] }}">{{ $view_order->subcategory['subcategory'] }}</option>
                      </select>
                    </div>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                    <!-- /.form-group -->
                    

                    <div class="form-group">
                        <label>Contact Information</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                          <option value="">{{ $view_order->user['fname'] }} {{ $view_order->user['lname'] }} {{ $view_order->user['city'] }} {{ $view_order->user->Lga['lga'] }} {{ $view_order->user->Lga->district['districts'] }} {{ $view_order->user->ngstate['state'] }}</option>
                        </select>
                      </div>
                      @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <!-- /.form-group -->
                      </div>
  
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
                    <a href="{{ asset('/public/../'.$view_order->images1)}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_order->images1)}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>

                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_order->images2)}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_order->images2)}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>

                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_order->images2)}}" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_order->images2)}}" class="img-fluid mb-2" alt="black sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_order->images3)}}" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_order->images3)}}" class="img-fluid mb-2" alt="red sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_order->images4)}}" data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_order->images4)}}" class="img-fluid mb-2" alt="red sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ asset('/public/../'.$view_order->images5)}}" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="gallery">
                      <img src="{{ asset('/public/../'.$view_order->images5)}}" class="img-fluid mb-2" alt="black sample"/>
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