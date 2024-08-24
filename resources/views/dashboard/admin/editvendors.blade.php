@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Distributor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Distributor</li>
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
              <form action="{{ url('admin/updatevendor/'.$edit_vendor->id) }}" method="post" enctype="multipart/form-data">
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
                            <label for="">First Name</label>
                            <input name="fname" type="text" @error('fname') is-invalid @enderror"
                            value="{{ $edit_vendor->fname }}" class="form-control"  placeholder="first name">
                        </div>
                        @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input name="lname" type="text" @error('name') is-invalid @enderror"
                            value="{{ $edit_vendor->lname }}" class="form-control"  placeholder="Last name">
                        </div>
                        @error('lname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="email" @error('email') is-invalid @enderror"
                            value="{{ $edit_vendor->email }}" class="form-control"  placeholder="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="phone" type="phone" @error('phone') is-invalid @enderror"
                            value="{{ $edit_vendor->phone }}" class="form-control"  placeholder="phone">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <select name="ngstate_id" class="form-control select2" style="width: 100%;">
                              <option value="{{ $edit_vendor->ngstate['id'] }}">{{ $edit_vendor->ngstate['state'] }}</option>
                              @foreach ($view_states as $view_state)
                                <option value="{{ $view_state->id }}">{{ $view_state->state }}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          @error('ngstate_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror


                          <div class="form-group">
                            <label>Subscription Fee</label>
                            <select name="subscription_fee" class="form-control select2" style="width: 100%;">
                              <option value="{{ $edit_vendor->subscription_fee }}">{{ $edit_vendor->subscription_fee }}</option>
                            </select>
                          </div>
                          @error('subscription_fee')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror


                          <div class="form-group">
                            <label for="">Districts</label>
                            <input disabled name="districts" type="text" @error('districts') is-invalid @enderror"
                            value="{{ $edit_vendor->Lga->district['districts'] }}" class="form-control" id="" placeholder="districts">
                        </div>
                        @error('districts')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>State</label>
                            <select name="lga_id" class="form-control select2" style="width: 100%;">
                              <option value="{{ $edit_vendor->Lga['id'] }}">{{ $edit_vendor->Lga['lga'] }}</option>
                              @foreach ($view_lgas as $view_lga)
                                <option value="{{ $view_lga->id }}">{{ $view_lga->lga }}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          @error('lga_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror

                   

                 
                    <div class="form-group">
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$edit_vendor->images")}}" alt=""></td>

                        <label for="">Image</label>
                        <input name="images" type="file" @error('images') is-invalid @enderror"
                        value="{{ old('images') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      <!-- /.form-group -->

                    
                </div>
                  
         
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

  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });
  
      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
  @include('dashboard.admin.footer')