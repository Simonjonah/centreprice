@include('dashboard.header')

@include('dashboard.sidebar')

  
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
         
                <div class="card-body">
                    @if(Auth::guard('web')->user()->status == 'approved')
                    
                    @foreach ($view_subscriptions as $view_subscription)
                    @if ($view_subscription->user_type == 'Franchise')
                    <h2>
                     <h1>Franchise Subscription Fee ₦{{ $view_subscription->amount  }}   @if (Auth::user()->role == '1')
                      
                    @elseif (Auth::user()->role == '2')
                    Distributor
                    @else
                    Vendor
                    @endif</h1>
                     
                     <form method="POST" action="{{ url('buy') }}" id="paymentForm">
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
                         {{ csrf_field() }}
                     
                         <input name="amount" type="hidden" value="{{ $view_subscription->amount  }}" placeholder="Name" />
                         <input name="email" type="hidden" value="{{ Auth::user()->email  }}" placeholder="Your Email" />
                         <input name="fname" type="hidden" value="{{ Auth::user()->fname  }}" placeholder="Your Email" />
                         <input name="lname" type="hidden" value="{{ Auth::user()->lname  }}" placeholder="Your Email" />
                         <input name="user_id" type="hidden" value="{{ Auth::user()->id  }}" placeholder="Your Email" />
                          @if (Auth::user()->role == '1')
                            <input name="user_type" type="hidden" value="Franchise" placeholder="Your Email" />
                          @elseif (Auth::user()->role == '2')
                            <input name="user_type" type="hidden" value="Distributor" placeholder="Your Email" />
                          @else
                            <input name="user_type" type="hidden" value="Vendor" placeholder="Your Email" />
                          @endif
                         <input name="phone" type="hidden" value="{{ Auth::user()->phone  }}" placeholder="Phone number" />
                         <input name="plan_id" type="hidden" value="{{ $view_subscription->id  }}" placeholder="Phone number" />
                     
                         <input type="submit" class="btn btn-primary" value="Subscribe" />
                     </form>
                     {{-- <a href="{{ url('pay') }}">{{ $view_subscription->user_type  }} Subscription Fee ₦{{ $view_subscription->amount  }}</a></h2> --}}
                    @else
                      
                    @endif
                     @endforeach

                    @endif


                  
                  </div>
                </div>

                {{-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}
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
  @include('dashboard.footer')