@include('dashboard.header')

@include('dashboard.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width: 200px; height: 200px;" class="profile-user-img img-fluid img-circle"
                       src="{{ asset('/public/../'.$view_singdistributor->images)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $view_singdistributor->fname }}</h3>

                <p class="text-muted text-center">@if ($view_singdistributor->user_type == 'Franchise')
                  Franchise
                @elseif ($view_singdistributor->user_type == 'Distributor')
                  Distributor
                @else
                Vendor
                @endif</p>

                {{-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Distributors</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Vendors</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Bonuses</b> <a class="float-right">13,287</a>
                  </li>
                </ul> --}}

                {{-- <a href="#" class="btn btn-primary btn-block"><b>View Analysis</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{ $view_singdistributor->ngstate['state'] }}  {{ $view_singdistributor->Lga->district['districts'] }} {{ $view_singdistributor->Lga['lga'] }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Position</strong>

                <p class="text-muted">
                  @if ($view_singdistributor->user_type == 'Franchise')
                  <span class="tag tag-danger">Franchise</span>
                @elseif ($view_singdistributor->user_type == 'Distributor')
                <span class="tag tag-danger">Distributor</span>
               
                @elseif ($view_singdistributor->user_type == 'Vendor')
                <span class="tag tag-danger">Vendor</span>
                @else
                <span class="tag tag-danger">Vendor</span>
                @endif
                </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img style="width: 100px; height: 100px;" class="profile-user-img img-fluid img-circle"
                        src="{{ asset('/public/../'.$view_singdistributor->images)}}"
                        alt="User profile picture">
                        <span class="username">
                          <a href="#">{{ $view_singdistributor->name }}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">{{$view_singdistributor->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{$view_singdistributor->address }}
                      </p>

                     
                    </div>
                   {{-- <a href="{{ url('web/viewmyvendors') }}" class="btn btn-primary">View Vendors</a> --}}
                   <a href="{{ url('web/viewmyvendorsales/'.$view_singdistributor->id) }}" class="btn btn-success">View Sales</a>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form action="{{ url('admin/updatefranchise/'.$view_singdistributor->ref_no) }}" method="post" enctype="multipart/form-data">
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
                  @method('PUT')
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="fname" value="{{ $view_singdistributor->fname }}" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="lname" value="{{ $view_singdistributor->lname }}" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="number" name="phone" value="{{ $view_singdistributor->phone }}" class="form-control" id="inputEmail" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{ $view_singdistributor->email }}" class="form-control" id="inputEmail" placeholder="Email Number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <select name="ngstate_id" class="form-control select2" style="width: 100%;">
                            <option value="{{ $view_singdistributor->ngstate['id'] }}">{{ $view_singdistributor->ngstate['state'] }}</option>
                            @foreach ($view_states as $view_state)
                              <option value="{{ $view_state->id }}">{{ $view_state->state }}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('ngstate_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Districts</label>
                        <div class="col-sm-10">
                          <input disabled type="text" value="{{ $view_singdistributor->Lga->district['districts'] }}" class="form-control" id="inputSkills" placeholder="Districts">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <select name="lga_id" class="form-control select2" style="width: 100%;">
                            <option value="{{ $view_singdistributor->Lga['id'] }}">{{ $view_singdistributor->Lga['lga'] }}</option>
                            @foreach ($view_lgas as $view_lga)
                              <option value="{{ $view_lga->id }}">{{ $view_lga->lga }}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('lga_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="address" id="inputExperience" placeholder="Experience">
                            {{ $view_singdistributor->address }}
                          </textarea>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                          <img style="width: 100px; height: 100px;" class="profile-user-img img-fluid img-circle"
                          src="{{ asset('/public/../'.$view_singdistributor->images)}}"
                          alt="User profile picture">
                          <input type="file" name="images" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        {{-- <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div> --}}
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboard.footer')