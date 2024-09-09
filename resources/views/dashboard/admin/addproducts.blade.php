@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
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
              <form action="{{ url('admin/createproduct') }}" method="post" enctype="multipart/form-data">
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
                        <input type="hidden" name="category_id" value="{{ $view_subcategories->category['id'] }}">
                        <input type="hidden" name="root_id" value="{{ $view_subcategories->category->root['id'] }}">
                        {{-- <h2>S{{ $view_subcategories->id }}</h2> --}}
                        <label>Select SubCategory</label>
                        <select name="subcategory_id" class="form-control" style="width: 100%;">
                          <option value="{{ $view_subcategories->id }}">{{ $view_subcategories->subcategory }}</option>
                          
                          
                        </select>
                      </div>
                      @error('subcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group">
                        <label for="">Distributor Commission</label>
                        <input name="distributors_commission" type="text" @error('distributors_commission') is-invalid @enderror"
                        value="{{ old('distributors_commission') }}" class="form-control" id="" placeholder="Distributor Commission">
                    </div>
                    @error('distributors_commission')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                     <div class="form-group">
                        <label for="">Franchise Commission</label>
                        <input name="franchise_commission" type="text" @error('franchise_commission') is-invalid @enderror"
                        value="{{ old('franchise_commission') }}" class="form-control" id="" placeholder="Franchise Commission">
                    </div>
                    @error('franchise_commission')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                     <div class="form-group">
                        <label for="">vendor Commission</label>
                        <input name="vendors_commission" type="text" @error('vendors_commission') is-invalid @enderror"
                        value="{{ old('vendors_commission') }}" class="form-control" id="" placeholder="vendor Commission">
                    </div>
                    @error('vendors_commission')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">Quantity</label>
                      <input name="quantity" type="text" @error('quantity') is-invalid @enderror"
                      value="{{ old('quantity') }}" class="form-control" id="" placeholder="Quantity">
                  </div>
                  @error('quantity')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
{{-- 

                    <div class="form-group">
                      <textarea name="body" id="compose-textarea" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control" style="height: 300px">
                       
                      </textarea>
                  </div>
                  @error('body')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror --}}
                    
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Amount</label>
                        <input name="amount" type="number" @error('amount') is-invalid @enderror"
                        value="{{ old('amount') }}" class="form-control" id="" placeholder="Amount">
                    </div>
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->
                   
                      <div class="form-group">
                        <label for="">Promo</label>
                        <input name="percent" type="number" @error('percent') is-invalid @enderror"
                        value="{{ old('percent') }}" class="form-control" id="" placeholder="Promo">
                    </div>
                    @error('percent')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="">Image</label>
                        <input required name="images1" type="file" @error('images1') is-invalid @enderror"
                        value="{{ old('images1') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
  @include('dashboard.admin.footer')