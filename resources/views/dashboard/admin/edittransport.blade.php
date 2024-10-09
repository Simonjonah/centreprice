@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Nigeria Geo Political Zones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Nigeria Geo Political Zones</li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add Nigeria Geo Political Zones</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/updatetransport/'.$edit_transport->ref_no) }}" method="post" enctype="multipart/form-data">
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
                       
                        <label>Political Zones</label>
                          <select name="zone" type="text" @error('zone') is-invalid @enderror"
                          value="{{ old('zone') }}" class="form-control" id="">
                          
                          <option value="{{ $edit_transport->zone }}">{{ $edit_transport->zone }}</option>
                          <option value="North Central (NC)">North Central (NC)</option>
                          <option value="North East (NE)">North East (NE)</option>
                          <option value="North West (NW)">North West (NW)</option>
                          <option value="South West (SW)">South West (SW)</option>
                          <option value="South East (SE) ">South East (SE) </option>
                          <option value="South South (SS)">South South (SS)</option>
                        </select>
                      </div>
                      @error('zone')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Select State</label>
                        <select name="state" type="text" @error('state') is-invalid @enderror"
                          value="{{ old('state') }}" class="form-control" id="">
                          <option value="{{ $edit_transport->state }}">{{ $edit_transport->state }}</option>

                          @foreach ($view_states as $view_state)
                            <option value="{{ $view_state->state }}">{{ $view_state->state }}</option>
                          @endforeach
                          
                        </select>
                    </div>
                    @error('state')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                      <label for="">Amount</label>
                      <input name="fee" type="text" @error('fee') is-invalid @enderror"
                        value="{{ $edit_transport->fee }}" class="form-control" placeholder="Transport Amount">
                        
                  </div>
                  @error('fee')
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