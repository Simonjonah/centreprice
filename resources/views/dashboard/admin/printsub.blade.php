@include('dashboard.admin.header')
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
            <i class="fas fa-globe"></i> Center Prices.
            <small class="float-right">Date: {{ $print_subscriptions->created_at->format('D m, Y, h:a') }}</small>
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
              <td>{{ $print_subscriptions->user['fname'] }} {{ $print_subscriptions->lname }}</td>
              <td>{{ $print_subscriptions->end_date }}</td>
              <td>{{ $print_subscriptions->user_type }}</td>
              <td>{{ $print_subscriptions->start_date }}</td>
              <td> N {{ $print_subscriptions->amount }}</td>
              <td>@if ($print_subscriptions->status == null)
                <span class="badge badge-warning"> Not Approved Yet</span>
              @elseif($print_subscriptions->status == 'suspend')
              <span class="badge badge-danger"> Suspended</span>
              @elseif($print_subscriptions->status == 'reject')
              <span class="badge badge-danger"> Rejected</span>
              @elseif($print_subscriptions->status == 'success')
              <span class="badge badge-success"> Paid</span>
              @elseif($print_subscriptions->status == 'pending')
              
              <span class="badge badge-warning">Pending</span>
              @endif</td>
            </tr>
           
            </tbody>
          </table>
      </div>
      <!-- /.col -->
    </div>
   
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
