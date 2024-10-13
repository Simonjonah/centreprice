@include('dashboard.header')

@include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        @foreach ($view_myprodocts as $view_myprodoct)
        <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-body">
                  <div class="card" style="width: 18rem;">
                      <img style="width: 100%; height: 250px;" src="{{ URL::asset("/public/../$view_myprodoct->images1")}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><b>{{ $view_myprodoct->subcategory['subcategory'] }} </b>Quantities {{ $view_myprodoct->quantity }}</b></h5>
                        <p class="card-text">₦{{ $view_myprodoct->amount }} </p>
                        <a href="{{ url('web/viewproductsbyvendor/'.$view_myprodoct->ref_no) }}" class="btn btn-primary">View Products</a> 
                        {{-- <br> <br>
                        <a href="{{ url('web/ordermyproducts/'.$view_myprodoct->ref_no) }}" class="btn btn-success">Order Products</a> --}}
                      </div>
                    </div>
              </div>
            </div>
          </div>    
        @endforeach
        

        <div class="col-md-4">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputEstimatedDuration"><a href="{{ url('web/viewcatoryproduct/') }}">Categories</a></label>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('dashboard.footer')