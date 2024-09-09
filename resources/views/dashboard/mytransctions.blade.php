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
                  @foreach ($my_transactions as $my_transaction)
                    <tr>
                        <td>{{ $my_transaction->user['ref_no'] }}</td>
                        <td>{{ $my_transaction->user['fname'] }}</td>
                        <td>{{ $my_transaction->user['lname'] }}</td>
                        <td>{{ $my_transaction->subscription->plan['amount'] }}</td>
                        <td>{{ $my_transaction->subscription['end_date'] }}</td>
                        <td>@if ($my_transaction->user['role'] == '1')
                            <span class="badge badge-primary"> Franchise</span>
                            @elseif ($my_transaction->user['role'] == '2')
                            <span class="badge badge-info"> Distributor</span>
                            @elseif ($my_transaction->user['role'] == '3')
                         
                          <span class="badge badge-success">Vendor</span>
                          @endif</td>
                       
                       

                        <td><a href="{{ url('web/printspayment/'.$my_transaction->id) }}"
                          class='btn btn-info'>
                           <i class="fa fa-print">Prints</i>
                       </a></td>
                       
                       <td>@if ($my_transaction->status == 'pending')
                        <span class="badge badge-secondary"> Pending</span></td>
                       @elseif ($my_transaction->status == 'success')
                        <span class="badge badge-success"> Success</span></td>
                        @elseif ($my_transaction->status == 'declined')
                        <span class="badge badge-warning"> Declined</span></td>
                        @else
                        <span class="badge badge-danger"> Canceled</span></td>
                           
                       @endif
                        
                     <td>{{ $my_transaction->created_at->format('D d, M Y, H:i')}}</td>
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
