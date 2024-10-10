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
              <form action="{{ url('admin/updateroles/'.$assigned_roles->ref_no) }}" method="post" enctype="multipart/form-data">
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
                  <label>Assign Permission</label>
                  <select name="role" class="form-control">
                    <option value="{{ $assigned_roles->role }}">{{ $assigned_roles->role }}</option>
                    <option value="1">General</option>
                    <option value="2">Account</option>
                    <option value="3">Purchases</option>
                    <option value="4">Registration/Membership</option>
                     
                    
                  </select>
                </div>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                  <label>Select Admin</label>
                  <select name="admin_id" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select Admin</option>
                    @foreach ($view_admins as $view_admin)
                      <option value="{{ $view_admin->id }}">  <td>{{ $view_admin->name }} @if ($view_admin->role == null)
                        <span class="badge badge-warning"> Not Assigned</span>
                      @elseif($view_admin->role == '1')
                      <span class="badge badge-danger"> General</span>
                      @elseif($view_admin->role == '2')
                      <span class="badge badge-warning"> Account</span>
                      @elseif($view_admin->role == '3')
                      <span class="badge badge-success"> Purchases</span>
                      @elseif($view_admin->role == '4')
                      
                      <span class="badge badge-success">Registration/Membership</span>
                      @endif</td></option>
                    @endforeach
                    
                  </select>
                </div>
                @error('districts')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  
               

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Assigned</button>
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