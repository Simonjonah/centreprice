@include('dashboard.admin.header')
@include('dashboard.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Center Prices.
                    <small class="float-right">Date: {{ $view_transactions->created_at->format('D m, Y, h:a') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>CenterPrices.</strong><br>
                    B3 Shelter Afrique Shopping Complex, Mbiaobong, Uyo. Akwa Ibom State. <br>
                    Call:+234 806 833 3055 <br>
                    Email:centerpricesng@gmail.com <br>
                  </address>
                </div>
                <!-- /.col -->
                {{-- <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div> --}}
                <!-- /.col -->
                {{-- <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Expired Date</th>
                      <th>Plan</th>
                      <th>Registered Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{ $view_transactions->user['fname'] }} {{ $view_transactions->lname }}</td>
                      <td>{{ $view_transactions->end_date }}</td>
                      <td>{{ $view_transactions->user_type }}</td>
                      <td>{{ $view_transactions->start_date }}</td>
                      <td> N {{ $view_transactions->amount }}</td>
                      <td>@if ($view_transactions->status == null)
                        <span class="badge badge-warning"> Not Approved Yet</span>
                      @elseif($view_transactions->status == 'suspend')
                      <span class="badge badge-danger"> Suspended</span>
                      @elseif($view_transactions->status == 'reject')
                      <span class="badge badge-danger"> Rejected</span>
                      @elseif($view_transactions->status == 'success')
                      <span class="badge badge-success"> Paid</span>
                      @elseif($view_transactions->status == 'pending')
                      
                      <span class="badge badge-warning">Pending</span>
                      @endif</td>
                    </tr>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                      
                  <a href="{{ url('admin/printsub/'.$view_transactions->reference) }}" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                  {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> --}}
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@include('dashboard.admin.footer')
  