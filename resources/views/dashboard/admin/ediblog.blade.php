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
              <form action="{{ url('admin/updateblog/'.$edit_blog->slug) }}" method="post" enctype="multipart/form-data">
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
                        <label for="">Title</label>
                        <input name="title" type="text" @error('title') is-invalid @enderror"
                        value="{{ $edit_blog->title }}" class="form-control" id="" placeholder="Title">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <td><img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$edit_blog->images")}}" alt=""></td>

                     <!-- /.form-group -->
                     <div class="form-group">
                        <label for="">Image</label>
                        <input name="images" type="file" @error('images') is-invalid @enderror"
                        value="{{ old('images') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      
                    


                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea name="body" cols="10" rows="10" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control">{!!  $edit_blog->body !!}</textarea>
                  </div>
                  @error('body')
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