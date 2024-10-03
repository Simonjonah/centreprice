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
                        {{-- <th>Product_id</th> --}}
                        {{-- <th>User_id</th> --}}
                        {{-- <th>franchise_id</th> --}}
                        {{-- <th>distributors_id</th> --}}
                        {{-- <th>vendor_id</th> --}}
                        {{-- <th>franchise_comm</th>
                        <th>distributor_comm</th>
                        <th>vendor_com</th> --}}
                        
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  @php
                    $total = 0;
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
                    
                  {{-- <img src="{{ asset('/public/../$details->images1')}}"> --}}
                  {{-- <td><img style="width: auto; height: 30px;" src="{{ asset('/public/../$details['images1)}}" alt=""></td> --}}

                    {{-- <td>{{ $details['images1'] }}</td> --}}
                    <td>{{ $details['productname'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td> ₦ {{ $details['amount'] }}</td>
                    {{-- <td>{{ $details['images1'] }}</td> --}}
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
             
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Cart Total</h3>
              <table class="table table-bordered">
                
              <tbody>
                <tr>
                  <th>Subtotal</th>
                    <td> ₦ {{ $total }}</td>
                </tr>
                <tr>
                  <th>Order Total</th>
                    <td> ₦ {{ $total }}</td>
                </tr>
               
                  </tbody>
                </table>
                @php
                    $reference = substr(rand(0,time()),0, 9);
                @endphp
              <div class="mt-4">
                <form action="{{ url('payment/process') }}" method="post">
                  @csrf
                  
                  {{-- <input type="text" class="form-control" required name="amount" value="{{ $details[''] }}" placeholder="Quantity"> --}}
                  <input type="hidden" class="form-control"  name="amount" value="{{ $total }}">
                  <input type="hidden" class="form-control"  name="product_id" value="{{ $details['product_id'] }}">
                  {{-- <input type="hidden" class="form-control"  name="order_id" value="{{ $details['order_id'] }}"> --}}
                  <input type="hidden" class="form-control"  name="franchise_id" value="{{ $details['franchise_id'] }}">
                  <input type="hidden" class="form-control"  name="distributor_id" value="{{ $details['distributor_id'] }} ">
                  <input type="hidden" class="form-control"  name="email" value="{{ Auth::guard('web')->user()->email }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="first_name" value="{{ Auth::guard('web')->user()->fname }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="last_name" value="{{ Auth::guard('web')->user()->lname }}" placeholder="Quantity">
                  {{-- <input type="hidden" class="form-control"  name="phone" value="{{ Auth::guard('web')->user()->phone }}" placeholder="Quantity"> --}}
                  <input type="hidden" class="form-control"  name="vendor_id" value="{{ Auth::guard('web')->user()->id }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="user_id" value="{{ $details['user_id']  }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="phone" value="{{ Auth::guard('web')->user()->phone }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="reference" value="{{ $reference }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="franchise_commission" value="{{ $details['franchise_commission'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="distributors_commission" value="{{ $details['distributors_commission'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="vendors_commission" value="{{ $details['vendors_commission'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="quantity" value="{{ $details['quantity'] }}" placeholder="Quantity">
                  <input type="hidden" class="form-control"  name="productname" value="{{ $details['productname'] }}" placeholder="Quantity">
                  {{-- <input type="hidden" class="form-control"  name="order_id" value="{{ $details['order_id'] }}" placeholder="Quantity"> --}}
                  {{-- <input type="hidden" class="form-control"  name="" value="{{ $details['quantity'] }}" placeholder="Quantity"> --}}
                  
                  
                  
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
