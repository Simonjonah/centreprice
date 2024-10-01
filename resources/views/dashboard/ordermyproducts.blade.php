@include('dashboard.header')

@include('dashboard.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Products</li>
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
              <form action="{{ url('web/createorders') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- @method('PUT') --}}
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
                        <label> Root Name</label>
                        <select name="root_id" class="form-control" style="width: 100%;">
                          <option value="{{ $order_products->root['id'] }}">{{ $order_products->root['rootname'] }}</option>
                        </select>
                      </div>
                      @error('root_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group">
                        <label>SubCategory</label>
                        <select name="category_id" class="form-control" style="width: 100%;">
                          <option value="{{ $order_products->category['id'] }}">{{ $order_products->category['category'] }}</option>
                        </select>
                      </div>
                      @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="form-group">
                      <label for="">Quantity {{ $order_products->quantity }}</label>
                      
                  </div>
                  @error('quantity')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Quantity </label>
                        <input name="quantityordered" type="number" @error('quantityordered') is-invalid @enderror"
                        value="{{ old('quantityordered') }}" class="form-control" id="" placeholder="Quantity">
                    </div>
                    @error('quantityordered')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label>Product</label>
                      <select name="subcategory_id" class="form-control" style="width: 100%;">
                        <option value="{{ $order_products->subcategory['id'] }}">{{ $order_products->subcategory['subcategory'] }}</option>
                      </select>
                    </div>
                    @error('subcategory_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->

                    {{-- <div class="form-group">
                      <label>Assigned Distributor</label>
                      <select name="user_id" class="form-control" style="width: 100%;">
                        @foreach ($view_distributors as $view_distributor)
                          <option value="{{ $view_distributor->id }}">{{ $view_distributor->lname }} {{ $view_distributor->fname }}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror --}}

                 
                    
                    <input type="hidden" name="productname" value="{{ $order_products->subcategory['subcategory'] }}">
                    <input type="hidden" name="product_id" value="{{ $order_products->id }}">
                    <input type="hidden" name="distributor_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                    <input type="hidden" name="franchise_id" value="{{ Auth::user()->user_id }}">
                    
                    <input type="hidden" name="franchise_commission" value="{{ $order_products->franchise_commission }}">
                    <input type="hidden" name="distributors_commission" value="{{ $order_products->distributors_commission }}">
                    <input type="hidden" name="vendors_commission" value="{{ $order_products->vendors_commission }}">
                    <input type="hidden" name="amount" value="{{ $order_products->amount }}">
                    {{-- <input type="hidden" name="quantityassignened" value="{{ $order_products->quantityassignened }}"> --}}
                    <input type="hidden" name="images1" value="{{ $order_products->images1 }}">
                      <input type="hidden" name="images2" value="{{ $order_products->images2 }}">
                      <input type="hidden" name="images3" value="{{ $order_products->images3 }}">
                      <input type="hidden" name="images4" value="{{ $order_products->images4 }}">
                      <input type="hidden" name="images5" value="{{ $order_products->images5 }}">
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
  </div>
  @include('dashboard.footer')