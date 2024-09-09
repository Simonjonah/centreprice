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
                  @foreach ($view_distributors as $view_distributor)
                    <tr>
                        <td>{{ $view_distributor->ref_no2 }}</td>
                        <td>{{ $view_distributor->fname }}</td>
                        <td>{{ $view_distributor->lname }}</td>
                        {{-- <td>{{ $view_distributor->subscription_fee }}</td> --}}
                        <td>@if ($view_distributor->role == '2')
                            <span class="badge badge-info"> Distributor</span>
                          @else
                          <span class="badge badge-success">Admin</span>
                          @endif</td>
                        <td>{{ $view_distributor->phone }}</td>
                        <td>{{ $view_distributor->email }}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$view_distributor->images")}}" alt=""></td>
                        
                        
                        {{-- <td>{{ $view_distributor->amount }}</td>
                        <td>{{ $view_distributor->percent }}</td> --}}
                        <td>{{ $view_distributor->ngstate['state'] }}</td>
                        <td>{{ $view_distributor->Lga->district['districts'] }}</td>
                        <td>{{ $view_distributor->Lga['lga'] }}</td>

                        <td><a href="{{ url('admin/viewsingledistributor/'.$view_distributor->ref_no2) }}"
                          class='btn btn-info'>
                           <i class="far fa-eye"></i>
                       </a></td>
                        <td>@if ($view_distributor->status == null)
                            <span class="badge badge-warning"> Not Approved Yet</span>
                          @elseif($view_distributor->status == 'suspend')
                          <span class="badge badge-danger"> Suspended</span>
                          @elseif($view_distributor->status == 'reject')
                          <span class="badge badge-danger"> Rejected</span>
                          @elseif($view_distributor->status == 'approved')
                          <span class="badge badge-success"> Approved</span>
                          @elseif($view_distributor->status == 'admitted')
                          
                          <span class="badge badge-success">Admitted</span>
                          @endif</td>
                        <td><a href="{{ url('admin/approvedistributor/'.$view_distributor->ref_no2) }}"
                          class='btn btn-success'>
                           <i class="far fa-user"></i>
                       </a></td>
                       <td><a href="{{ url('admin/suspenddistributor/'.$view_distributor->ref_no2) }}"
                        class='btn btn-warning'>
                         <i class="far fa-bell"></i>
                     </a></td>
                       <td><a href="{{ url('admin/editdistributor/'.$view_distributor->ref_no2) }}"
                        class='btn btn-info'>
                         <i class="far fa-edit"></i>
                     </a></td>
                       
                         
                       <td><a href="{{ url('admin/deletedistributor/'.$view_distributor->ref_no2) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_distributor->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
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
