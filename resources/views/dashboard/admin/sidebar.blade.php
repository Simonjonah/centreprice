 <!-- Main Sidebar Container -->
 @if(Auth::guard('admin')->user()->status == null)
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('admin/home')}}" class="brand-link">
       <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
       <span class="brand-text font-weight-light">Centerprices</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img style="width: 50px; height: 50px;" src="{{ asset('assets/dist/img/logo.jpeg') }}" class="img-circle elevation-2" alt="User Image">
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
                 <a href="{{ url('admin/home') }}" class="nav-link active">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Dashboard </p>
                 </a>
               </li>
             
             </ul>
           </li>
           {{-- <li class="nav-item">
             <a href="{{ url('admin/profile') }}" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>
                 Profile
                 <span class="right badge badge-danger">New</span>
               </p>
             </a>
           </li> --}}
           
           
           
           <li class="nav-item">
             <a href="{{ url('admin/logout')}}" class="nav-link">
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
 
 @elseif(Auth::guard('admin')->user()->status == 'suspend')
 
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('admin/home')}}" class="brand-link">
       <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
       <span class="brand-text font-weight-light">Centerprices</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('admin')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
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
                 <a href="{{ url('admin/home') }}" class="nav-link active">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Dashboard </p>
                 </a>
               </li>
             
             </ul>
           </li>
           {{-- <li class="nav-item">
             <a href="{{ url('admin/franchisesubscription') }}" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>
                 Subscriptions
                 <span class="right badge badge-danger">New</span>
               </p>
             </a>
           </li> --}}
           
           
           
           <li class="nav-item">
             <a href="{{ url('admin/logout')}}" class="nav-link">
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
 
 {{-- @elseif (Auth::guard('admin')->user()->status == '2') --}}
 @elseif (Auth::guard('admin')->user()->status == 'approved' && Auth::guard('admin')->user()->role == '2')
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/logo.jpeg') }}" class="img-circle elevation-2" alt="User Image">
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
                <a href="{{ url('admin/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            
            </ul>
          </li>
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Distributors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewdistributorsadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Distributor</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vendors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewvendorsadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Vendors</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Subscription
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{ url('admin/addsubcription') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subscription</p>
                </a>
              </li> --}}
              
              <li class="nav-item">
                <a href="{{ url('admin/distributorsubcription') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Distributor Sub</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('admin/vendorsubcription') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Vendors Sub</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Plans
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addplan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Plan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewplan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Plan</p>
                </a>
              </li>
              
            </ul>
          </li> 

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Product Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/vieworders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Orders</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Transports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addtransport') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Transports</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewtransports') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Transports</p>
                </a>
              </li>
              
            </ul>
          </li>
          

          <li class="nav-item">
            <a href="{{ url('admin/logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  @elseif (Auth::guard('admin')->user()->status == 'approved' && Auth::guard('admin')->user()->role == '3')
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('admin/home') }}" class="brand-link">
       <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
       <span class="brand-text font-weight-light">Admin</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img src="{{ asset('assets/dist/img/logo.jpeg') }}" class="img-circle elevation-2" alt="User Image">
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
                 <a href="{{ url('admin/home') }}" class="nav-link active">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Dashboard </p>
                 </a>
               </li>
             
             </ul>
           </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                LGA
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addlga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add LGA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewlga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View LGA</p>
                </a>
              </li>
             
            </ul>
          </li>
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                State
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addstate') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add State</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewstates') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View State</p>
                </a>
              </li>
             
            </ul>
          </li>
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Senaterial District
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addsenatarial') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Senatarial District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewsenatarials') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Senatarial District</p>
                </a>
              </li>
             
            </ul>
          </li>
  
           
           
           
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Product Orders
                 <i class="fas fa-angle-left right"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ url('admin/vieworders') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>View All Orders</p>
                 </a>
               </li>



              <li class="nav-item">
                <a href="{{ url('admin/viewpendingorders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Pending Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewpaidorders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View paid Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewdeliveredorders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Delivered Orders</p>
                </a>
              </li>

               
             
             </ul>
           </li>
 
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Transports
                 <i class="fas fa-angle-left right"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ url('admin/addtransport') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add Transports</p>
                 </a>
               </li>
 
               <li class="nav-item">
                 <a href="{{ url('admin/viewtransports') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>View Transports</p>
                 </a>
               </li>
               
             </ul>
           </li>
           
 
           <li class="nav-item">
             <a href="{{ url('admin/logout') }}" class="nav-link">
               <i class="nav-icon far fa-circle text-warning"></i>
               <p>Logout</p>
             </a>
           </li>
           
         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
   </aside>
 

   @elseif (Auth::guard('admin')->user()->status == 'approved' && Auth::guard('admin')->user()->role == '4')
 
   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('admin/home') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/dist/img/logo.jpeg') }}" class="img-circle elevation-2" alt="User Image">
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
                  <a href="{{ url('admin/home') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard </p>
                  </a>
                </li>
              
              </ul>
            </li>
            <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-copy"></i>
               <p>
                 LGA
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">6</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ url('admin/addlga') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add LGA</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{ url('admin/viewlga') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>View LGA</p>
                 </a>
               </li>
              
             </ul>
           </li>
   
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-copy"></i>
               <p>
                 State
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">6</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ url('admin/addstate') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add State</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{ url('admin/viewstates') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>View State</p>
                 </a>
               </li>
              
             </ul>
           </li>
   
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-copy"></i>
               <p>
                 Senaterial District
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">6</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ url('admin/addsenatarial') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add Senatarial District</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{ url('admin/viewsenatarials') }}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>View Senatarial District</p>
                 </a>
               </li>
              
             </ul>
           </li>
   
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Distributors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewdistributorsadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Distributor</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewundistributorsadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Unregistered Distributors</p>
                </a>
              </li>
            </ul>
          </li>
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vendors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewunvendorsadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Unregistered Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewvendorsadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Vendors</p>
                </a>
              </li>


            </ul>
          </li>
  
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Transports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('admin/addtransport') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Transports</p>
                  </a>
                </li>
  
                <li class="nav-item">
                  <a href="{{ url('admin/viewtransports') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Transports</p>
                  </a>
                </li>
                
              </ul>
            </li>
            
  
            <li class="nav-item">
              <a href="{{ url('admin/logout') }}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Logout</p>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  


  @else

  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('admin/home') }}" class="brand-link">
    <img src="{{ asset('assets/dist/img/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/dist/img/logo.jpeg') }}" class="img-circle elevation-2" alt="User Image">
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
              <a href="{{ url('admin/home') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard </p>
              </a>
            </li>
          
          </ul>
        </li>
        {{-- <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> --}}
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              LGA
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addlga') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add LGA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewlga') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View LGA</p>
              </a>
            </li>
           
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              State
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addstate') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add State</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewstates') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View State</p>
              </a>
            </li>
           
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Senaterial District
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addsenatarial') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Senatarial District</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewsenatarials') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Senatarial District</p>
              </a>
            </li>
           
          </ul>
        </li>

        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Milestones
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addmilestone') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Milestone</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewmilestones') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Milestones</p>
              </a>
            </li>
            
          </ul>
        </li> --}}
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Products Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ url('admin/addroots') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Root</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/viewroots') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Roots</p>
              </a>
            </li>

            {{-- <li class="nav-item">
              <a href="{{ url('admin/addcategory') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{ url('admin/viewcategory') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Category</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ url('admin/addsubcategory') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add SubCategory</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{ url('admin/viewsubcategory') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View SubCategory</p>
              </a>
            </li>
           
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Products
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            {{-- <li class="nav-item">
              <a href="{{ url('admin/addproducts') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Products</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{ url('admin/viewproducts') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Products</p>
              </a>
            </li>
           
          </ul>
        </li>

        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Franchise
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/viewfranchise') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Franchise</p>
              </a>
            </li>
          </ul>
        </li> --}}

          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Bank
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/viewbank') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Bank</p>
              </a>
            </li>
          </ul>
        </li> 

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Distributors
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/viewdistributorsadmin') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Distributor</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{ url('admin/viewundistributorsadmin') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Unregistered Distributors</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Vendors
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/viewvendorsadmin') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Vendors</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/viewvendorsadmin') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Vendors</p>
              </a>
            </li>
          </ul>
        </li>
       

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Subscription
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            {{-- <li class="nav-item">
              <a href="{{ url('admin/addsubcription') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Subscription</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ url('admin/viewsubcription') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Franchise Sub</p>
              </a>
            </li> --}}

            <li class="nav-item">
              <a href="{{ url('admin/distributorsubcription') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Distributor Sub</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('admin/vendorsubcription') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Vendors Sub</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Plans
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addplan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Plan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewplan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Plan</p>
              </a>
            </li>
            
          </ul>
        </li> 

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Adverts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addadverts') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Advertis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewadvertments') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Advertisements</p>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Product Orders
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/vieworders') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Orders</p>
              </a>
            </li>



           <li class="nav-item">
             <a href="{{ url('admin/viewpendingorders') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>View Pending Orders</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ url('admin/viewpaidorders') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>View paid Orders</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ url('admin/viewdeliveredorders') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>View Delivered Orders</p>
             </a>
           </li>

            
          
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Transports
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addtransport') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Transports</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/viewtransports') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Transports</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Administration
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addteam') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Team</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewteam') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Team</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/addtestimony') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Testimony</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/viewtestimony') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Testimony</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/addblog') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Blog</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/viewblog') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Blog</p>
              </a>
            </li>
            
           
          </ul>
        </li>
        <li class="nav-header">Contact</li>
        <li class="nav-item">
          <a href="{{ url('admin/viewcontact') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>View Contacts</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/addabout') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add About</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/viewabout') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View About</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="{{ url('admin/addpartner') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Partner</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/viewpartners') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Partners</p>
              </a>
            </li>
          </ul>
        </li> 

       
        <li class="nav-item">
          <a href="{{ url('admin/viewroles') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>View Roles</p>
          </a>
        </li>



        <li class="nav-item">
          <a href="{{ url('admin/logout') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
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
