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
                        <label for="">Product Name</label>
                        <input name="productname" type="text" @error('productname') is-invalid @enderror"
                        value="{{ $view_product->productname }}" class="form-control" id="" placeholder="Product Name">
                    </div>
                    @error('productname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                      <textarea name="body" id="compose-textarea" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control" style="height: 300px">
                       {!! $view_product->body !!}
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
                      <!-- /.form-group -->
                      <div class="form-group">
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$view_product->images1")}}" alt=""></td>

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
                    <a href="{{ URL::asset("/public/../$view_product->images1")}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="{{ URL::asset("/public/../$view_product->images1")}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ URL::asset("/public/../$view_product->images2")}}" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                      <img src="{{ URL::asset("/public/../$view_product->images2")}}" class="img-fluid mb-2" alt="black sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ URL::asset("/public/../$view_product->images3")}}" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                      <img src="{{ URL::asset("/public/../$view_product->images3")}}" class="img-fluid mb-2" alt="red sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ URL::asset("/public/../$view_product->images4")}}" data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                      <img src="{{ URL::asset("/public/../$view_product->images4")}}" class="img-fluid mb-2" alt="red sample"/>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{ URL::asset("/public/../$view_product->images5")}}" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="gallery">
                      <img src="{{ URL::asset("/public/../$view_product->images5")}}" class="img-fluid mb-2" alt="black sample"/>
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
  </div>

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
  @include('dashboard.admin.footer')