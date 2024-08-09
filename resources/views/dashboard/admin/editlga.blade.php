@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add LGA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add LGA</li>
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
               
              <form action="{{ url('admin/updatetelga/'.$edit_lga->id) }}" method="post" enctype="multipart/form-data">
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
                  <label>Select State</label>
                  <select name="state" class="form-control select2" style="width: 100%;">
                    <option value="{{ $edit_lga->state }}">{{ $edit_lga->state }}</option>
                    @foreach ($view_states as $view_state)
                      <option value="{{ $view_state->state }}">{{ $view_state->state }}</option>
                    @endforeach
                    
                  </select>
                </div>
                @error('state')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  
                <div class="form-group">
                  <label for="">LGA</label>
                  <input name="lga" type="text"@error('lga') is-invalid @enderror"
                    value="{{ $edit_lga->lga }}" class="form-control" id="" placeholder="LGA">
                </div>
                  @error('lga')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror

                </div>
                <!-- /.card-body -->

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