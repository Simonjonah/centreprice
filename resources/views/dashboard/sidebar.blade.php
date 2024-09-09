 <!-- Main Sidebar Container -->
@if(Auth::guard('web')->user()->status == null)
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('web/home')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Centerprices</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('web/profile') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          
          
          
          <li class="nav-item">
            <a href="{{ url('web/logout')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@elseif(Auth::guard('web')->user()->status == 'suspend')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('web/home')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Centerprices</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('web/franchisesubscription') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Subscriptions
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          
          
          
          <li class="nav-item">
            <a href="{{ url('web/logout')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 @elseif (Auth::guard('web')->user()->status == 'approved' && Auth::guard('web')->user()->role == '1')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('web/home')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Centerprices</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Franchise Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('web/profile') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                My Distributors
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/mydistributors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View My Distributors</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                My Vendors
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/myvendors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View My Vendors</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Transactions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/mytransctions') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Transactions</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ url('web/resetmypassword') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reset Password</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ url('web/lockscreen') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Subcriptions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{ url('web/franchisesubscription') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subscribe</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/mysubscriptions') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subscription</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          
        
          <li class="nav-item">
            <a href="{{ url('web/logout')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @elseif (Auth::guard('web')->user()->status == 'approved' && Auth::guard('web')->user()->role == '2')
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('web/home')}}" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Centerprices</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->fname }}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Distributor Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{ url('web/home') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard </p>
                  </a>
                </li>
              
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ url('web/profile2') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Profile
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            
  
            {{-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  My Vendors
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('web/myvendorsbydistributor') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View My Vendors</p>
                  </a>
                </li>
                
              </ul>
            </li> --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Transactions
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('web/mytransctions') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Transactions</p>
                  </a>
                </li>
                
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('web/ordermyproducts') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Order Products</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('web/myproducts') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Products</p>
                  </a>
                </li>
                
              </ul>
            </li>
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                {{-- <li class="nav-item">
                  <a href="pages/examples/login.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/register.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Register</p>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a href="{{ url('web/resetmypassword') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reset Password</p>
                  </a>
                </li>
               
                <li class="nav-item">
                  <a href="{{ url('web/lockscreen') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lockscreen</p>
                  </a>
                </li>
                
                
              </ul>
            </li>
  
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Subcriptions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               
                <li class="nav-item">
                  <a href="{{ url('web/franchisesubscription') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Subscribe</p>
                  </a>
                </li>
  
                <li class="nav-item">
                  <a href="{{ url('web/mysubscriptions') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Subscription</p>
                  </a>
                </li>
                
                
              </ul>
            </li>
            
            
            <li class="nav-item">
              <a href="{{ url('web/logout')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    @elseif (Auth::guard('web')->user()->status == 'approved' && Auth::guard('web')->user()->role == '3')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('web/home')}}" class="brand-link">
          <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Centerprices</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->fname }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Vendor Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                    <a href="{{ url('web/home') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard </p>
                    </a>
                  </li>
                
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ url('web/profile2') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Profile
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              
    
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    My Vendors
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('web/myvendorsbydistributor') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View My Vendors</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Transactions
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('web/mytransctions') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>My Transactions</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
  
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Products
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('web/myproducts') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Products</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/lockscreen.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lockscreen</p>
                    </a>
                  </li>
                  
                  
                </ul>
              </li>
              
              
              <li class="nav-item">
                <a href="{{ url('web/logout')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
@endif
 
 