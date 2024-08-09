@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Subcategory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Subcategory</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/createsubcategory') }}" method="post" enctype="multipart/form-data">
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

                <div class="card-body">
                  
                <div class="form-group">
                  <label>Select Category</label>
                  <select name="category" class="form-control select2" style="width: 100%;">
                    <option value="">Select Category</option>
                    @foreach ($view_categories as $view_categorie)
                      <option value="{{ $view_categorie->id }}">{{ $view_categorie->category }}</option>
                    @endforeach
                    
                  </select>
                </div>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                


                <div class="form-group">
                    <label for="">Sub Category Name</label>
                    <input name="subcategory" type="text" @error('subcategory') is-invalid @enderror"
                    value="{{ old('subcategory') }}" class="form-control" id="" placeholder="Enter subcategory Name">
                </div>
                @error('subcategory')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
             

                <div class="form-group">
                    <textarea name="body" id="compose-textarea" @error('body') is-invalid @enderror"
                    value="{{ old('body') }}" class="form-control" style="height: 300px">
                     
                    </textarea>
                </div>
                @error('body')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboard.admin.footer')