@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subscription</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subscription</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/createstate') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif

                <div class="card-body">
                    @if(Auth::guard('web')->user()->status == null)
                    @foreach ($view_franchise_subs as $view_franchise_sub)
                    @if ($view_franchise_sub->user_type == 'Franchise')
                    <h2>
                     <h1>Make a Payment</h1>
                     <h3>Buy Movie Tickets N500.00</h3>
                     <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                         {{ csrf_field() }}
                     
                         <input name="name" placeholder="Name" />
                         <input name="email" type="email" placeholder="Your Email" />
                         <input name="phone" type="tel" placeholder="Phone number" />
                     
                         <input type="submit" value="Buy" />
                     </form>
                     {{-- <a href="{{ url('pay') }}">{{ $view_franchise_sub->user_type  }} Subscription Fee ₦{{ $view_franchise_sub->amount  }}</a></h2> --}}
                    @else
                      
                    @endif
                     @endforeach

                    <!-- <div class="form-group">
                    <label for="">Senatarial District</label>
                    <input name="senate" type="text"@error('senate') is-invalid @enderror"
                    value="{{ old('senate') }}" class="form-control" id="" placeholder="Enter Senatarial District">
                  </div>
                  @error('senate')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror -->
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboard.admin.footer')