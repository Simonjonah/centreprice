@include('dashboard.admin.header')
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
            <i class="fas fa-globe"></i> Center Prices.
            {{-- <small class="float-right">Date: {{ $view_admintransaction->created_at->format('D m, Y, h:a') }}</small> --}}
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
            @foreach ($view_admintransactions as $view_admintransaction)
            <tr>
                <td>{{ $view_admintransaction->user['fname'] }} {{ $view_admintransaction->lname }}</td>
                <td>{{ $view_admintransaction->end_date }}</td>
                <td>{{ $view_admintransaction->user_type }}</td>
                <td>{{ $view_admintransaction->start_date }}</td>
                <td> N {{ $view_admintransaction->amount }}</td>
                <td>@if ($view_admintransaction->status == null)
                  <span class="badge badge-warning"> Not Approved Yet</span>
                @elseif($view_admintransaction->status == 'suspend')
                <span class="badge badge-danger"> Suspended</span>
                @elseif($view_admintransaction->status == 'reject')
                <span class="badge badge-danger"> Rejected</span>
                @elseif($view_admintransaction->status == 'success')
                <span class="badge badge-success"> Paid</span>
                @elseif($view_admintransaction->status == 'pending')
                
                <span class="badge badge-warning">Pending</span>
                @endif</td>
              </tr>
             
            @endforeach
            
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
