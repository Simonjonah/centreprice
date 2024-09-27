@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Products</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/updateadverts/'.$view_advertsingleads->ref_no) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
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
                      <div class="form-group">
                       
                        <label>Company Name</label>
                          <input name="company_name" type="text" @error('company_name') is-invalid @enderror"
                          value="{{ $view_advertsingleads->company_name }}" class="form-control" id="" placeholder="Company Name">
                      </div>
                      @error('company_name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group">
                        <label for="">Title</label>
                        <input name="title" type="text" @error('title') is-invalid @enderror"
                        value="{{ $view_advertsingleads->title }}" class="form-control" id="" placeholder="Title">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                     <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" type="email" @error('email') is-invalid @enderror"
                        value="{{ $view_advertsingleads->email }}" class="form-control" id="" placeholder="Email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                     <div class="form-group">
                        <label for="">Phone</label>
                        <input name="phone" type="text" @error('phone') is-invalid @enderror"
                        value="{{ $view_advertsingleads->phone }}" class="form-control" id="" placeholder="Phone">
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">Address</label>
                      <input name="address" type="text" @error('address') is-invalid @enderror"
                      value="{{ $view_advertsingleads->address }}" class="form-control" id="" placeholder="Address">
                  </div>
                  @error('address')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="">Whatsapp Link</label>
                    <input name="whatsapp" type="text" @error('whatsapp') is-invalid @enderror"
                    value="{{ $view_advertsingleads->whatsapp }}" class="form-control" id="" placeholder="Whatsapp Link">
                </div>
                @error('whatsapp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                
                    
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Facebook</label>
                        <input name="facebook" type="text" @error('facebook') is-invalid @enderror"
                        value="{{ $view_advertsingleads->facebook }}" class="form-control" id="" placeholder="Facebook Link">
                    </div>
                    @error('facebook')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- /.col -->
                   
                      <div class="form-group">
                        <label for="">Twitter Link</label>
                        <input name="twitter" type="text" @error('twitter') is-invalid @enderror"
                        value="{{ $view_advertsingleads->twitter }}" class="form-control" id="" placeholder="Twitter Link">
                    </div>
                    @error('twitter')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="">Linkedin Link</label>
                        <input name="linkedin" type="text" @error('linkedin') is-invalid @enderror"
                        value="{{ $view_advertsingleads->linkedin }}" class="form-control" id="" placeholder="Linkedin Link">
                    </div>
                    @error('linkedin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">Event Date</label>
                      <input name="event_date" type="text" @error('event_date') is-invalid @enderror"
                      value="{{ $view_advertsingleads->event_date }}" class="form-control" id="" placeholder="Event Date">
                  </div>
                  @error('event_date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                      <!-- /.form-group -->

                      <div class="form-group">
                        <label for="">Message</label>

                            <textarea name="body" id="compose-textarea" @error('body') is-invalid @enderror"
                            value="{{ old('body') }}" class="form-control" style="height: 300px">
                            {!! $view_advertsingleads->body !!}
                            </textarea>
                        </div>
                        @error('body')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    
                    
                      <div class="form-group">
                        <img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$view_advertsingleads->images1")}}" alt="">
                        <label for="">Image</label>
                        <input required name="images1" type="file" @error('images1') is-invalid @enderror"
                        value="{{ old('images1') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    
                    </div>
                    <!-- /.col -->
                  </div>
                  {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div> --}}
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
  @include('dashboard.admin.footer')