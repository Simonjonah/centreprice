
<?php
    use App\Models\Ngstate;
    use App\Models\District;
    use App\Models\Lga;
    $view_states = Ngstate::orderby('state')->get();
    $view_dists = District::orderby('districts')->get();
    $view_lgas = Lga::orderby('lga')->get();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Vendors </b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <!-- <p class="login-box-msg">Register a new membership</p> -->

      <form action="{{ route('web.createvendor') }}" method="post">
        @csrf

    @if (Session::get('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    @endif

    @if (Session::get('fail'))
    <div class="alert alert-danger">
      {{ Session::get('fail') }}
    </div>
  @endif

 
  
        <div class="input-group mb-3">
          <input name="fname" type="text" class="form-control" @error('fname') is-invalid @enderror"
          value="{{ old('fname') }}" placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('fname')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="input-group mb-3">
          <input name="lname" type="text" class="form-control" @error('lname') is-invalid @enderror"
          value="{{ old('lname') }}" placeholder="Last name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('lname')
        <span class="text-danger">{{ $message }}</span>
        @enderror


        <label for="">Select State</label>
        <div class="input-group mb-3">
          <select name="ngstate_id" class="form-control">
          <option value="">Select State</option>

            @foreach ($view_states as $view_state)

                <option value="{{ $view_state->id }}">{{ $view_state->state }}</option>
            @endforeach
          </select>
        </div>


        <label for="">City</label>
          <div class="input-group mb-3">
            <input type="text" name="city"  class="form-control"  @error('city') is-invalid @enderror"
            value="{{ old('city') }}" placeholder="city">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('city')
              <span class="text-danger">{{ $message }}</span>
          @enderror 
          <label for="">Date Of Birth</label>
          <div class="input-group mb-3">
            <input type="date" name="dob"  class="form-control"  @error('dob') is-invalid @enderror"
            value="{{ old('dob') }}" placeholder="dob">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('dob')
              <span class="text-danger">{{ $message }}</span>
          @enderror 

         <label for="">Select Gender</label>
        <div class="input-group mb-3">
          <select name="gender" class="form-control">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
          </select>
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('gender')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <label for="">Select LGA</label>
        <div class="input-group mb-3">
          <select name="lga_id" class="form-control">
                <option value="">Select LGA</option>
                @foreach ($view_lgas as $lga)
                  <option value="{{ $lga->id }}">{{ $lga->lga }}</option>
                @endforeach
          </select>
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('lga_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror


        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control"  @error('email') is-invalid @enderror"
          value="{{ old('email') }}" placeholder="email">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
       
        
          <div class="input-group mb-3">
            <input type="tel" name="phone"  class="form-control"  @error('phone') is-invalid @enderror"
            value="{{ old('phone') }}" placeholder="Phone">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          @error('phone')
              <span class="text-danger">{{ $message }}</span>
          @enderror 
             

          <div class="input-group mb-3">
            <input type="password" name="password" id="myInput" class="form-control"  @error('password') is-invalid @enderror"
            value="{{ old('password') }}" placeholder="password">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror 
          
          <label for="">Confirm Password</label>
          
          <div class="input-group mb-3">
            <input type="password" name="confirm_password" id="myInmput" class="form-control"  @error('confirm_password') is-invalid @enderror"
            value="{{ old('confirm_password') }}" placeholder="Confirm password">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('confirm_password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <input type="checkbox" onclick="myFunction()">Show Password
            </div>
         
            
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
  
        <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  
  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
  
  
  
  <script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  
  
  
  </script>
        