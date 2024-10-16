@include('dashboard.header')

@include('dashboard.sidebar')


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
                    
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Amount</th>
                    
                    <th>State</th>
                    <th>Districts</th>
                    <th>LGA</th>
                    <th>View</th>
                    <th>Status</th>
                    {{-- <th>Approve</th>
                    <th>Suspend</th>
                    <th>Edit</th>

                    <th>Delete</th> --}}
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
                  @foreach ($view_vendors as $view_vendor)
                    <tr>
                        <td>{{ $view_vendor->ref_no2 }}</td>
                        <td>{{ $view_vendor->fname }}</td>
                        <td>{{ $view_vendor->lname }}</td>
                        <td>@if ($view_vendor->user_type == 'Vendor')
                            <span class="badge badge-success"> Vendor</span>
                          @else
                          <span class="badge badge-danger">Admin</span>
                          @endif</td>
                        <td>{{ $view_vendor->phone }}</td>
                        <td>{{ $view_vendor->email }}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$view_vendor->images")}}" alt=""></td>
                        <td>{{ $view_vendor->amount }}</td>
                        <td>{{ $view_vendor->ngstate['state'] }}</td>
                        <td>{{ $view_vendor->Lga->district['districts'] }}</td>
                        <td>{{ $view_vendor->Lga['lga'] }}</td>

                        <td><a href="{{ url('web/viewsinglevendorfran/'.$view_vendor->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-eye"></i>
                       </a></td>
                        <td>@if ($view_vendor->status == null)
                            <span class="badge badge-warning"> Not Approved Yet</span>
                          @elseif($view_vendor->status == 'pending')
                          <span class="badge badge-danger"> Pending</span>
                          @elseif($view_vendor->status == 'declined')
                          <span class="badge badge-danger"> Declined</span>
                          @elseif($view_vendor->status == 'success')
                          <span class="badge badge-success"> Verified</span>
                          @elseif($view_vendor->status == 'admitted')
                          
                          <span class="badge badge-success">Admitted</span>
                          @endif</td>
                        
                     <td>{{ $view_vendor->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Tract ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Amount</th>
                        
                        <th>State</th>
                        <th>Districts</th>
                        <th>LGA</th>
                        <th>View</th>
                        <th>Status</th>
                        {{-- <th>Approve</th>
                        <th>Suspend</th>
                        <th>Edit</th>
    
                        <th>Delete</th> --}}
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

@include('dashboard.footer')
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
