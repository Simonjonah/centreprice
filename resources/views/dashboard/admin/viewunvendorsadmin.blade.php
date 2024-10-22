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
                    <th>First name</th>
                    <th>Last name</th>
                    {{-- <th>Subription Fee</th> --}}
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Image</th>
                    {{-- <th>Amount</th>
                    <th>Percent</th> --}}
                    <th>State</th>
                    <th>Districts</th>
                    <th>LGA</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Suspend</th>
                    <th>Edit</th>

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
                  @foreach ($view_unusers as $view_unuser)
                    <tr>
                        <td>{{ $view_unuser->ref_no }}</td>
                        <td><a href="{{ url('admin/viewsubscriptionpaymentprint/'.$view_unuser->id) }}">{{ $view_unuser->fname }} View Payment</a></td>
                        <td>{{ $view_unuser->lname }}</td>
                        {{-- <td>{{ $view_unuser->subscription_fee }}</td> --}}
                        <td>@if ($view_unuser->user_type == 'Distributor')
                            <span class="badge badge-info"> Distributor</span>
                          @else
                          <span class="badge badge-success">Admin</span>
                          @endif</td>
                        <td>{{ $view_unuser->phone }}</td>
                        <td>{{ $view_unuser->email }}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$view_unuser->images")}}" alt=""></td>
                        
                        
                        {{-- <td>{{ $view_unuser->amount }}</td>
                        <td>{{ $view_unuser->percent }}</td> --}}
                        <td>{{ $view_unuser->ngstate['state'] }}</td>
                        <td>{{ $view_unuser->Lga->district['districts'] }}</td>
                        <td>{{ $view_unuser->Lga['lga'] }}</td>

                        <td><a href="{{ url('admin/viewsingledistributor/'.$view_unuser->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-eye"></i>
                       </a></td>
                        <td>@if ($view_unuser->status == 'pending')
                            <span class="badge badge-warning"> Pending</span>
                          @elseif($view_unuser->status == 'suspend')
                          <span class="badge badge-danger"> Suspended</span>
                          @elseif($view_unuser->status == 'reject')
                          <span class="badge badge-danger"> Rejected</span>
                          @elseif($view_unuser->status == 'success')
                          <span class="badge badge-success"> Verified</span>
                          @elseif($view_unuser->status == 'admitted')
                          
                          <span class="badge badge-success">Admitted</span>
                          @endif</td>
                        <td><a href="{{ url('admin/approvedistributor/'.$view_unuser->ref_no) }}"
                          class='btn btn-success'>
                           <i class="far fa-user"></i>
                       </a></td>
                       <td><a href="{{ url('admin/suspenddistributor/'.$view_unuser->ref_no) }}"
                        class='btn btn-warning'>
                         <i class="far fa-bell"></i>
                     </a></td>
                       <td><a href="{{ url('admin/editdistributor/'.$view_unuser->ref_no) }}"
                        class='btn btn-info'>
                         <i class="far fa-edit"></i>
                     </a></td>
                       
                         
                       <td><a href="{{ url('admin/deletedistributor/'.$view_unuser->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_unuser->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tract ID</th>
                      <th>First name</th>
                      <th>Last name</th>
                      {{-- <th>Subription Fee</th> --}}
                      <th>user_type</th>                      <th>Phone</th>
                      <th>Email</th>
                      <th>Image</th>
                      {{-- <th>Amount</th>
                      <th>Percent</th> --}}
                      <th>State</th>
                      <th>Districts</th>
                      <th>LGA</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Approve</th>
                      <th>Suspend</th>
                      <th>Edit</th>
  
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
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
