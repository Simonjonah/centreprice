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
              <form action="{{ url('admin/createteam') }}" method="post" enctype="multipart/form-data">
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
                        <label for="">First Name</label>
                        <input name="fname" type="text" @error('fname') is-invalid @enderror"
                        value="{{ old('fname') }}" class="form-control" id="" placeholder="First Name">
                    </div>
                    @error('fname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                     <div class="form-group">
                        <label for="">Last Name</label>
                        <input name="lname" type="text" @error('lname') is-invalid @enderror"
                        value="{{ old('lname') }}" class="form-control" id="" placeholder="Last Name">
                    </div>
                    @error('lname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                     <div class="form-group">
                        <label for="">Position</label>
                        <input name="position" type="text" @error('position') is-invalid @enderror"
                        value="{{ old('position') }}" class="form-control" id="" placeholder="Position">
                    </div>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">Facebook</label>
                      <input name="facebook" type="text" @error('facebook') is-invalid @enderror"
                      value="{{ old('facebook') }}" class="form-control" id="" placeholder="facebook">
                  </div>
                  @error('facebook')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Twitter</label>
                        <input name="twitter" type="text" @error('twitter') is-invalid @enderror"
                        value="{{ old('twitter') }}" class="form-control" id="" placeholder="twitter">
                    </div>
                    @error('twitter')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->
                   
                      <div class="form-group">
                        <label for="">Linkedin</label>
                        <input name="linkedin" type="text" @error('linkedin') is-invalid @enderror"
                        value="{{ old('linkedin') }}" class="form-control" id="" placeholder="Linkedin">
                    </div>
                    @error('linkedin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea name="body" cols="10" rows="10" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control"></textarea>
                  </div>
                  @error('body')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="">Image</label>
                        <input required name="images" type="file" @error('images') is-invalid @enderror"
                        value="{{ old('images') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images')
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