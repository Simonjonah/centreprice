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
                    <th>Roots</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Amount</th>
                    
                    <th>View</th>
                    <th>Payment Status</th>
                    
                    <th>Product Status</th>
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
                  @foreach ($view_purchases as $view_purchase)
                    <tr>
                        <td>{{ $view_purchase->product['ref_no'] }}</td>
                        <td>{{ $view_purchase->product->subcategory->category->root['rootname'] }}</td>
                        <td>{{ $view_purchase->product->subcategory->category['category'] }}</td>
                        <td>{{ $view_purchase->product->subcategory['subcategory'] }}</td>
                        <td>{{ $view_purchase->quantity }}</td>
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$view_purchase->images1")}}" alt=""></td>
                        <td>{{ $view_purchase->amount }}</td>

                        <td><a href="{{ url('web/viewgoodsbyvendor/'.$view_purchase->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       <td>@if ($view_purchase->status == 'pending')
                          <span class="badge badge-secondary">Payment Pending</span>
                          @elseif ($view_purchase->status == 'failed')
                        
                          <span class="badge badge-warning">Payment Failed</span>

                          @elseif ($view_purchase->status == 'received')
                          <span class="badge badge-primary">Product Received</span>

                          @elseif ($view_purchase->status == 'delivered')
                          <span class="badge badge-success">Product Delivered</span>
                          @elseif ($view_purchase->status == 'shipping')
                          <span class="badge badge-dark">Shipping</span>

                          @elseif ($view_purchase->status == 'success')
                          <span class="badge badge-info">Paid</span>
                        @endif
                       </td>
                  

                     <td>@if ($view_purchase->productstatus == 'received')
                      <span class="badge badge-success"> Received</span>
                     
                      @elseif ($view_purchase->productstatus == null)
                      <span class="badge badge-dark">Waiting to Shipp</span>
                      @elseif ($view_purchase->productstatus == 'shipping')
                      <span class="badge badge-dark">Shipping</span>
                    @endif
                   </td>

                    

                    
                     <td>{{ $view_purchase->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tract ID</th>
                      <th>Roots</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Quantity</th>
                      <th>Image</th>
                      <th>Amount</th>
                      
                      <th>View</th>
                      <th>Payment Status</th>
                      
                      <th>Product Status</th>
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
