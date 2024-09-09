@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tract ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Subscription Fee</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Email</th>
                    {{-- <th>Image</th> --}}
                    <th>State</th>
                    <th>Districts</th>
                    <th>LGA</th>
                    <th>View</th>
                    <th>View Payment</th>
                    <th>Status</th>
                   

                    <th>Delete</th> 
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                  @foreach ($viewsubscriptions as $viewsubscription)
                    @if ($viewsubscription->user['role'] === '2')
                    <tr>
                      <td>{{ $viewsubscription->user['ref_no'] }}</td>
                      <td>{{ $viewsubscription->user['fname'] }}</td>
                      <td>{{ $viewsubscription->user['lname'] }}</td>
                      <td>{{ $viewsubscription->plan['amount'] }}</td>
                      <td>@if ($viewsubscription->user['role'] === '1')
                          <span class="badge badge-info"> Franchise</span>
                          @elseif ($viewsubscription->user['role'] === '2')
                          <span class="badge badge-primary"> Distributor</span>

                        @else
                        <span class="badge badge-success">Vendor</span>
                        @endif</td>
                      <td>{{ $viewsubscription->user['phone'] }}</td>
                      <td>{{ $viewsubscription->user['email'] }}</td>
                      {{-- <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$viewsubscription->user['images']")}}" alt=""></td> --}}
                     
                      <td>{{ $viewsubscription->user->ngstate['state'] }}</td>
                      <td>{{ $viewsubscription->user->Lga->district['districts'] }}</td>
                      <td>{{ $viewsubscription->user->Lga['lga'] }}</td>

                      <td><a href="{{ url('admin/viewsinglefranchise/'.$viewsubscription->user['ref_no']) }}"
                        class='btn btn-info'>
                         <i class="far fa-eye">View User</i>
                     </a></td>


                     <td><a href="{{ url('admin/viewsubscriptionpayment/'.$viewsubscription->user_id) }}"
                        class='btn btn-success'>
                         <i class="far fa-eye">View Payment</i>
                     </a></td>
                      <td>@if ($viewsubscription->status == 'active')
                          <span class="badge badge-info"> Active</span>
                        @elseif($viewsubscription->status == 'canceled')
                        <span class="badge badge-danger"> Canceled</span>
                        @elseif($viewsubscription->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($viewsubscription->status == 'approved')
                        <span class="badge badge-success"> Approved</span>
                        @elseif($viewsubscription->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                     
                 
                     
                       
                     <td><a href="{{ url('admin/deletesubscriber/'.$viewsubscription->ref_no) }}"
                      class='btn btn-danger'>
                       <i class="far fa-trash-alt"></i>
                   </a></td> 
                   <td>{{ $viewsubscription->created_at->format('D d, M Y, H:i')}}</td>
                  </tr>
                    @else
                    @endif
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tract ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Subscription Fee</th>
                      <th>Role</th>
                      <th>Phone</th>
                      <th>Email</th>
                      {{-- <th>Image</th> --}}
                      <th>State</th>
                      <th>Districts</th>
                      <th>LGA</th>
                      <th>View</th>
                    <th>View Payment</th>

                      <th>Status</th>
                     
  
                      <th>Delete</th> 
                      <th>Date</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
</div>
<!-- ./wrapper -->

@include('dashboard.admin.footer')
