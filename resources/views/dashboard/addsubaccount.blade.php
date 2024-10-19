@include('dashboard.header')

@include('dashboard.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Account</li>
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
                <h3 class="card-title">Create Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('web/createSubaccount') }}" method="post" enctype="multipart/form-data">
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
                  </div>
                  @endif

                  <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                     <input type="hidden" name="distributor_id" value="{{ Auth::user()->user_id }}">
                     <input type="hidden" name="vendor_id" value="{{ Auth::user()->vendor_id }}">
                     <input type="hidden" name="distributor_email" value="{{ Auth::user()->distributor_email }}">
                      <input type="hidden" name="vendor_email" value="{{ Auth::user()->vendor_email }}">
                      <div class="form-group">
                        <input name="email" type="hidden" @error('email') is-invalid @enderror"
                        value="{{ Auth::user()->email }}" class="form-control" id="" placeholder="Email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                        <div class="form-group">
                        <label for="">First Name</label>

                              <input name="first_name" type="text" @error('first_name') is-invalid @enderror"
                              value="{{ Auth::user()->fname }}" class="form-control" id="" placeholder="first name">
                          </div>
                          @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                     
                    </div>
                    <div class="col-md-6">

                    <!-- /.col -->
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input name="last_name" type="text" @error('last_name') is-invalid @enderror"
                        value="{{ Auth::user()->lname }}" class="form-control" id="" placeholder="Last name">
                    </div>
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                        {{-- <label for="">Phone</label> --}}
                        <input name="phone" type="hidden" @error('phone') is-invalid @enderror"
                        value="{{ Auth::user()->phone }}" class="form-control" id="" placeholder="Phone">
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    {{-- <div class="form-group">
                      <label for="">Bank</label>
                      <input name="preferred_bank" type="text" @error('preferred_bank') is-invalid @enderror"
                      value="{{ old('preferred_bank') }}" class="form-control" id="" placeholder="preferred_bank">
                  </div>
                  @error('preferred_bank')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror --}}

                  

                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
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