@include('dashboard.header')

@include('dashboard.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Account</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Create Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('web/createSubaccount') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- @method('PUT') --}}
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif

                  <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      

                      {{-- <div class="form-group">
                        <label for="">Account Name</label>
                        <input name="business_name" type="text" @error('business_name') is-invalid @enderror"
                        value="{{ old('business_name') }}" class="form-control" id="" placeholder="Account Name">
                    </div>
                    @error('business_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror --}}

                    <div class="form-group">
                      <label for="">Email</label>
                      <input name="email" type="text" @error('email') is-invalid @enderror"
                      value="{{ old('email') }}" class="form-control" id="" placeholder="Email">
                  </div>
                  @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                     <div class="form-group">
                        <label for="">Bank Name</label>
                        <select type="text" class="form-control" name="settlement_bank">
                          <option selected>Choose</option>
                          <option value="access">Access Bank</option>
                          <option value="citibank">Citibank</option>
                          <option value="diamond">Diamond Bank</option>
                          <option value="ecobank">Ecobank</option>
                          <option value="fidelity">Fidelity Bank</option>
                          <option value="fcmb">First City Monument Bank (FCMB)</option>
                          <option value="fsdh">FSDH Merchant Bank</option>
                          <option value="gtb">Guarantee Trust Bank (GTB)</option>
                          <option value="heritage">Heritage Bank</option>
                          <option value="Keystone">Keystone Bank</option>
                          <option value="rand">Rand Merchant Bank</option>
                          <option value="skye">Skye Bank</option>
                          <option value="stanbic">Stanbic IBTC Bank</option>
                          <option value="standard">Standard Chartered Bank</option>
                          <option value="sterling">Sterling Bank</option>
                          <option value="suntrust">Suntrust Bank</option>
                          <option value="union">Union Bank</option>
                          <option value="uba">United Bank for Africa (UBA)</option>
                          <option value="unity">Unity Bank</option>
                          <option value="wema">Wema Bank</option>
                          <option value="zenith">Zenith Bank</option>
                          </select>
                        {{-- <input name="settlement_bank" type="text" @error('settlement_bank') is-invalid @enderror"
                        value="{{ old('settlement_bank') }}" class="form-control" id="" placeholder="Bank Name"> --}}
                    </div>
                    @error('settlement_bank')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Percentage_charge</label>
                        <input name="percentage_charge" type="text" @error('percentage_charge') is-invalid @enderror"
                        value="{{ old('percentage_charge') }}" class="form-control" id="" placeholder="percentage_charge">
                    </div>
                    @error('percentage_charge')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->
                   
                    <div class="form-group">
                      <label for="">Account Number</label>
                      <input name="account_number" type="text" @error('account_number') is-invalid @enderror"
                      value="{{ old('account_number') }}" class="form-control" id="" placeholder="account_number">
                  </div>
                  @error('account_number')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
              </form>
            </div>



            

          </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboard.footer')