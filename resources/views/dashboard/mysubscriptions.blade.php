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
                    <th>Amount</th>
                    <th>Expired Date</th>
                    <th>Role</th>
                    <th>Renewal</th>
                    <th>Canceled</th>
                   
                    <th>Status</th>
                   
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
                  @foreach ($view_mysubs as $view_mysub)
                    <tr>
                        <td>{{ $view_mysub->user['ref_no'] }}</td>
                        <td>{{ $view_mysub->user['fname'] }}</td>
                        <td>{{ $view_mysub->user['lname'] }}</td>
                        <td>{{ $view_mysub->plan['amount'] }}</td>
                        <td>{{ $view_mysub->end_date }}</td>
                        <td>@if ($view_mysub->user['role'] == '1')
                            <span class="badge badge-primary"> Franchise</span>
                            @elseif ($view_mysub->user['role'] == '2')
                            <span class="badge badge-info"> Distributor</span>
                            @elseif ($view_mysub->user['role'] == '3')
                         
                          <span class="badge badge-success">Vendor</span>
                          @endif</td>
                       
                       

                        <td><form action="{{ url('web/renew/'.$view_mysub->id) }}" method="post">
                          @csrf
                          <button type="submit" class="btn btn-primary">Renew</button>
                        </form></td>
                       <td><a href="{{ url('web/cancelsubscription/'.$view_mysub->id) }}"
                        class='btn btn-warning'>
                         <i class="far fa-user">Canceled</i>
                     </a></td>
                       <td>@if ($view_mysub->status == 'active')
                        <span class="badge badge-success"> Active</span></td>
                       @elseif ($view_mysub->status == 'canceled')
                        <span class="badge badge-warning"> Canceled</span></td>
                        @else
                        <span class="badge badge-danger"> Expired</span></td>
                           
                       @endif
                        
                     <td>{{ $view_mysub->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Tract ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Amount</th>
                        <th>Expired Date</th>
                        <th>Role</th>
                        <th>Renewal</th>
                        <th>Canceled</th>
                        
                        <th>Status</th>
                        
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
