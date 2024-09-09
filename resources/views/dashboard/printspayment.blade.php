@include('dashboard.header')
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> CenterPrice.
          <small class="float-right">Date: {{ $print_transactions->created_at->format('d/m/Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      

    <!-- Table row -->
    {{-- <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Amount</th>
            <th>Expired</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>{{ $print_transactions->user['ref_no'] }}</td>
            <td>{{ $print_transactions->user['fname'] }}</td>
            <td>{{ $print_transactions->user['lname'] }}</td>
            <td>{{ $print_transactions->user['phone'] }}</td>
            <td>₦ {{ $print_transactions->amount }}</td>
          </tr>
         
         
          </tbody>
        </table>
      </div>
      
    </div> --}}
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
       
        <table class="table">
            <tr>
              <th style="width:50%">First Name:</th>
              <td>{{ $print_transactions->user['fname'] }}</td>
            </tr>
            <tr>
              <th>Last Name</th>
              <td>{{ $print_transactions->user['lname'] }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $print_transactions->user['email'] }}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>{{ $print_transactions->user['phone'] }}</td>
            </tr>
          </table>
      </div>
      <!-- /.col -->
      <div class="col-6">
        {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Amount</th>
              <td>₦ {{ $print_transactions->amount }}</td>
            </tr>
            <tr>
              <th>User Type</th>
              <td>@if (Auth::user()->role == '1')
                  Franchise
                  @elseif (Auth::user()->role == '2')
                    Distributor
                  @else
                  Vendor
              @endif</td>
            </tr>
            <tr>
              <th>Registered Date</th>
              <td>{{ $print_transactions->created_at->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Expired Date</th>
                <td>{{ $print_transactions->subscription['end_date'] }}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
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
