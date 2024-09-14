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
                    <th>Productname</th>
                    <th>Cost</th>
                    <th>quantity</th>
                    <th>Amount</th>
                    <th>Earning</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Districts</th>
                    <th>LGA</th>
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
                  @foreach ($view_vendors as $view_vendor)
                    <tr>
                        <td>{{ $view_vendor->user['ref_no3'] }}</td>
                        <td>{{ $view_vendor->user['fname'] }}</td>
                        <td>{{ $view_vendor->user['lname'] }}</td>
                        <td>{{ $view_vendor->productname }}</td>
                        <td>NGN {{ $view_vendor->product['amount'] }}</td>
                        
                        <td>{{ $view_vendor->quantity }}</td>
                        <td> NGN {{ $view_vendor->amount }}</td>
                        <td>NGN {{ $view_vendor->franchise_commission }}</td>
                        <td>{{ $view_vendor->user['city'] }}</td>

                        <td>{{ $view_vendor->user->ngstate['state'] }}</td>
                        <td>{{ $view_vendor->user->Lga->district['districts'] }}</td>
                        <td>{{ $view_vendor->user->Lga['lga'] }}</td>

                       
                        <td>@if ($view_vendor->status == null)
                            <span class="badge badge-warning"> Not Approved Yet</span>
                          @elseif($view_vendor->status == 'suspend')
                          <span class="badge badge-danger"> Suspended</span>
                          @elseif($view_vendor->status == 'reject')
                          <span class="badge badge-danger"> Rejected</span>
                          @elseif($view_vendor->status == 'success')
                          <span class="badge badge-success"> Success</span>
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
                      <th>Productname</th>
                      <th>Cost</th>
                      <th>quantity</th>
                      <th>Amount</th>
                      <th>Earning</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Districts</th>
                      <th>LGA</th>
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
