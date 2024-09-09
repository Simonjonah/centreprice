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
              <form action="{{ url('admin/createorder') }}" method="post" enctype="multipart/form-data">
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
                        <label>Product</label>
                        <select name="subcategory_id" class="form-control" style="width: 100%;">
                          <option value="{{ $order_products->subcategory['id'] }}">{{ $order_products->subcategory['subcategory'] }}</option>
                        </select>
                      </div>
                      @error('subcategory_id')
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
                        <label for="">Quantity Assigned</label>
                        <input name="quantityassigned" type="number" @error('quantityassigned') is-invalid @enderror"
                        value="{{ old('quantityassigned') }}" class="form-control" id="" placeholder="Quantity Assigned">
                    </div>
                    @error('quantityassigned')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->

                    <div class="form-group">
                      <label>Assigned Distributor</label>
                      <select name="user_id" class="form-control" style="width: 100%;">
                        @foreach ($view_distributors as $view_distributor)
                          <option value="{{ $view_distributor->id }}">{{ $view_distributor->lname }} {{ $view_distributor->fname }}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                 
                   
                    <input type="text" name="franchise_commission" value="{{ $order_products->franchise_commission }}">
                    <input type="text" name="distributors_commission" value="{{ $order_products->distributors_commission }}">
                    <input type="text" name="vendors_commission" value="{{ $order_products->vendors_commission }}">
                    <input type="text" name="amount" value="{{ $order_products->amount }}">
                    {{-- <input type="text" name="quantityassignened" value="{{ $order_products->quantityassignened }}"> --}}
                    <input type="text" name="images1" value="{{ $order_products->images1 }}">
                      <input type="text" name="images2" value="{{ $order_products->images2 }}">
                      <input type="text" name="images3" value="{{ $order_products->images3 }}">
                      <input type="text" name="images4" value="{{ $order_products->images4 }}">
                      <input type="text" name="images5" value="{{ $order_products->images5 }}">
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