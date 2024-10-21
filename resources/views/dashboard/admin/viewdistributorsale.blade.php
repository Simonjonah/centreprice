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
                    <th>Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Image</th>
                    
                    <th>View</th>
                    <th>Payment Status</th>
                    <th>Approve</th>
                    <th>Suspend</th>
                    <th>Product Status</th>

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
                  @foreach ($distributor_sales as $distributor_sale)
                    <tr>
                        <td>{{ $distributor_sale->ref_no }}</td>
                        <td>{{ $distributor_sale->first_name }} {{ $distributor_sale->last_name }}</td>
                        <td>{{ $distributor_sale->productname }}</td>
                        
                        <td>{{ $distributor_sale->quantity }}</td>
                        <td>NGN {{ $distributor_sale->amount }}</td>
                        
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$distributor_sale->images1")}}" alt=""></td>

                        <td><a href="{{ url('admin/viewsingleorderadmin/'.$distributor_sale->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       <td>@if ($distributor_sale->status == 'pending')
                        <span class="badge badge-warning"> Pending</span>
                      @elseif($distributor_sale->status == 'success')
                      <span class="badge badge-info">Paid</span>
                      @elseif($distributor_sale->status == 'declined')
                      <span class="badge badge-danger"> Declined</span>
                      @elseif($distributor_sale->status == 'delivered')
                      <span class="badge badge-success"> Delivered</span>
                      @elseif($distributor_sale->status == 'admitted')
                      
                      <span class="badge badge-success">Admitted</span>
                      @endif</td>
                        
                        <td><a href="{{ url('admin/deliveredorder/'.$distributor_sale->ref_no) }}"
                          class='btn btn-success'>
                           <i class="far fa-user"></i>
                       </a></td>
                       <td><a href="{{ url('admin/suspendorderadmin/'.$distributor_sale->ref_no) }}"
                        class='btn btn-warning'>
                         <i class="far fa-bell"></i>
                     </a></td>
                       
                     <td>@if ($distributor_sale->productstatus == null)
                      <span class="badge badge-warning"> Pending</span>
                    @elseif($distributor_sale->productstatus == 'received')
                    <span class="badge badge-info">Received</span>
                    @elseif($distributor_sale->productstatus == 'declined')
                    <span class="badge badge-danger"> Declined</span>
                    @elseif($distributor_sale->productstatus == 'delivered')
                    <span class="badge badge-success"> Delivered</span>
                    @elseif($distributor_sale->productstatus == 'admitted')
                    
                    <span class="badge badge-success">Admitted</span>
                    @endif</td>
                         
                       <td><a href="{{ url('admin/deleteorderadmin/'.$distributor_sale->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $distributor_sale->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tract ID</th>
                      <th>Name</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                      <th>Image</th>
                      
                      <th>View</th>
                      <th>Payment Status</th>
                      <th>Approve</th>
                      <th>Suspend</th>
                      <th>Product Status</th>
  
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
