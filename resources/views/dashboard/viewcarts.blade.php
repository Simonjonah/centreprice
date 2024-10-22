@include('dashboard.header')

@include('dashboard.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cart</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cart</li>
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
                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if(session('cart'))
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  @php
                    $total = 0;
                    $totalAmount = 0;
                    $totp = 0;
                    $paid_total = 0;
                    
                @endphp
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
                  @foreach(session('cart') as $id => $details)
                @php
                    $total +=$details['quantity'] * $details['amount']
                @endphp
                <tr>
                
                    <td>{{ $details['productname'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td> ₦ {{ $details['amount'] }}</td>
                    {{-- <td>{{ $details['product_id'] }}</td> --}}
                    <td>{{ $details['quantity'] * $details['amount'] }}</td>
                    <td><a href="{{ route('web.remove', $id) }}"><i class="fas fa-trash mr-2"></i></a>
                </tr>
                @endforeach

            {{-- <td>{{ $total }}</td> --}}

                  </tbody>
                  
                </table>



                 <!-- Main content -->
     <section class="content">
      
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <label for="">Select Delivery Method</label>
        <div class="input-group mb-3">
          <select required id="yesNo" name="user_type" class="form-control">
            <option value="">Select Delivery Method</option>
            <option value="No">Without Transport Cost</option>
            <option value="Yes">With transport Cost</option>
            
        </select>
        </div>

        <div id="additionalInfo" style="display: none;">
          <div class="form-group">
            {{-- <form id="locationForm"> --}}
              <label for="location">Select State:</label>
              <select required name="transport_id" class="form-control" id="location">
                  <option value="">-- Select Location --</option>
                  @foreach($view_transports as $view_transport)
                      <option value="{{ $view_transport->id }}" data-cost="{{ $view_transport->fee }}">{{ $view_transport->state }} NGN {{ $view_transport->fee }}</option>
                  @php
                    $totp = $view_transport->fee;
                    
                  @endphp
                      @endforeach
              </select>
        
          </div>
        
      </div>

      <div id="additionaldis" style="display: none;">
        <label for="location">Select State:</label>
        <select name="transport_id" class="form-control" id="location">
            <option value="">-- Select Location --</option>
            @foreach($view_transports as $view_transport)
                <option value="{{ $view_transport->id }}" data-cost="{{ $view_transport->fee }}">{{ $view_transport->state }}</option>
            @endforeach
        </select>
    </div>
    

    




              <div class="form-group">
                <label for="">Delivery Address</label>
                <input name="delivery_address" type="text" @error('delivery_address') is-invalid @enderror"
                  value="{{ old('delivery_address') }}" class="form-control" placeholder="Delivery Address">
            </div>
            @error('delivery_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
              <label for="">Delivery Phone</label>
              <input name="delivery_phone" type="text" @error('delivery_phone') is-invalid @enderror"
                value="{{ old('delivery_phone') }}" class="form-control" placeholder="Delivery Phone">
          </div>
          @error('delivery_phone')
              <span class="text-danger">{{ $message }}</span>
          @enderror

        
        </div>
        {{-- <!-- /.col -->
        <div class="col-md-6"> --}}
        
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Cart Total</h3>
              <table class="table table-bordered">
                
              <tbody>
                <tr>
                  <th>Subtotal</th>
                    <td> ₦ {{ $total }}</td>
                </tr>
                <form action="{{ url('payment/process') }}" method="post">
                @csrf
                
                  </tbody>
                </table>
                @php
                    $reference = substr(rand(0,time()),0, 9);
                @endphp
              {{-- <div class="mt-4">
                  <td id="cartTotal">
                    <span id="totalAmount">
                    

                      <select class="form-control" name="amount">
                        <option value="{{ $total + $totalAmount }}">{{ $total + $totp }}</option>
                      </select>
                    </span>
                   
                </td> --}}

                
                  <input type="hidden" name="amount" class="form-control" value="{{ $total }}">

                  <input type="hidden" class="form-control"  name="product_id" value="{{ $details['product_id'] }}">
                  {{-- <input type="hidden" class="form-control"  name="franchise_id" value="{{ $details['franchise_id'] }}"> --}}
                  <input type="hidden" class="form-control"  name="distributor_id" value="{{ $details['distributor_id'] }} ">
                  <input type="hidden" class="form-control"  name="email" value="{{ Auth::guard('web')->user()->email }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="first_name" value="{{ Auth::guard('web')->user()->fname }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="last_name" value="{{ Auth::guard('web')->user()->lname }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="vendor_id" value="{{ Auth::guard('web')->user()->id }}" placeholder="Quantity">
                  {{-- <input type="hidden" class="form-control"  name="user_id" value="{{ $details['user_id']  }}" placeholder="Quantity"> --}}
                  <input type="hidden" class="form-control"  name="phone" value="{{ Auth::guard('web')->user()->phone }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="reference" value="{{ $reference }}" placeholder="Quantity">
                  {{-- <input type="hidden" class="form-control"  name="franchise_commission" value="{{ $details['franchise_commission'] }}" placeholder="Quantity"> --}}
                  <input type="hidden" class="form-control"  name="distributors_commission" value="{{ $details['distributors_commission'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="vendors_commission" value="{{ $details['vendors_commission'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="subvendor_commission" value="{{ $details['subvendor_commission'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="quantity" value="{{ $details['quantity'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="productname" value="{{ $details['productname'] }}" placeholder="Quantity">
                  {{-- <input type="hidden" class="form-control"  name="order_id" value="{{ $details['order_id'] }}" placeholder="Quantity"> --}}
                  {{-- <input type="hidden" class="form-control"  name="" value="{{ $details['quantity'] }}" placeholder="Quantity"> --}}
                  
                  <input type="hidden" class="form-control"  name="distributor_email" value="{{ Auth::guard('web')->user()->distributor_email }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="subvendor_email" value="{{ Auth::guard('web')->user()->subvendor_email }}" placeholder="Quantity">
                  
                  
                  <input type="hidden" class="form-control"  name="images1" value="{{ $details['images1'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="images2" value="{{ $details['images2'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="images3" value="{{ $details['images3'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="images4" value="{{ $details['images4'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="images5" value="{{ $details['images5'] }}" placeholder="Quantity">
                  
                  
                  <div class="form-group" style="margin-top: 20px">
                    <button type="submit" class="btn btn-success btn-block btn-flat">
                       Check Out    <i class="fas fa-arrow-right mr-2"></i>
                    </button>
                  </div>
                </form>
                
              </div>

            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


                @else   

                  <p class="text-red text-center">Your cart is empty</p>
                @endif
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

<script>

  
document.getElementById('yesNo').addEventListener('change', function() {
    var additionalInfo = document.getElementById('additionalInfo');
    if (this.value === 'Yes') {
        additionalInfo.style.display = 'block';
    } else {
        additionalInfo.style.display = 'none';
    }

  });


  document.getElementById('yesNo').addEventListener('change', function() {
    var additionaldis = document.getElementById('additionaldis');
    if (this.value === 'No') {
        additionaldis.style.display = 'block';
    } else {
        additionaldis.style.display = 'none';
    }

  });



  document.getElementById('location').addEventListener('change', function() {
    let transportCost = parseFloat(this.options[this.selectedIndex].getAttribute('data-cost'));
    let cartTotal = parseFloat(document.getElementById('totalAmount').innerText);

    // Add transport cost to cart total
    let newTotal = cartTotal + transportCost;

    // Update the total display
    document.getElementById('totalAmount').innerText = newTotal.toFixed(2);
});
</script>
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
