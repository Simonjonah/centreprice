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
              <form action="{{ url('admin/updateproduct/'.$edit_product->ref_no) }}" method="post" enctype="multipart/form-data">
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
                          <option value="{{ $edit_product->subcategory['id'] }}">{{ $edit_product->subcategory['subcategory'] }}</option>
                          @foreach ($view_subcategories as $view_subcategorie)
                            <option value="{{ $view_subcategorie->id }}">{{ $view_subcategorie->subcategory }}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      @error('subcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <!-- /.col -->
                   
                      

                  

                <div class="form-group">
                  <label for="">Vendor Commission</label>
                  <input name="vendors_commission" type="number" @error('vendors_commission') is-invalid @enderror"
                  value="{{ $edit_product->vendors_commission }}" class="form-control" id="" placeholder="vendors_commission">
              </div>
              @error('vendors_commission')
                  <span class="text-danger">{{ $message }}</span>
              @enderror

              <div class="form-group">
                <label for="">Quantity</label>
                <input name="quantity" type="number" @error('quantity') is-invalid @enderror"
                value="{{ $edit_product->quantity }}" class="form-control" id="" placeholder="Quantity">
            </div>
            @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror

                    <div class="form-group">
                      <textarea name="body" id="compose-textarea" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control" style="height: 300px">
                       {!! $edit_product->subcategory['body'] !!}
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
                        value="{{ $edit_product->amount }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">Franchise Commission</label>
                      <input name="franchise_commission" type="number" @error('franchise_commission') is-invalid @enderror"
                      value="{{ $edit_product->franchise_commission }}" class="form-control" id="" placeholder="franchise_commission">
                  </div>
                  @error('franchise_commission')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="">Distributor Commission</label>
                    <input name="distributors_commission" type="number" @error('distributors_commission') is-invalid @enderror"
                    value="{{ $edit_product->distributors_commission }}" class="form-control" id="" placeholder="distributors_commission">
                </div>
                @error('distributors_commission')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                    <div class="form-group">
                      <label for="">promo</label>
                      <input name="percent" type="number" @error('percent') is-invalid @enderror"
                      value="{{ $edit_product->percent }}" class="form-control" id="" placeholder="Promo">
                  </div>
                  @error('percent')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                      <!-- /.form-group -->
                      <div class="form-group">
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$edit_product->images1")}}" alt=""></td>

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