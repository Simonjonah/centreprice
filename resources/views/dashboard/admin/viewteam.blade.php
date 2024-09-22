@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Team ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                    <th>Images</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Linkedin</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Approve</th>
                    <th>Suspend</th>
                    <th>Delete</th>
                    <th>Date</th>
                  </tr>
                  </thead>
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
                  @foreach ($view_teams as $view_team)
                    <tr>
                        <td>{{ $view_team->ref_no }}</td>
                        <td>{{ $view_team->fname }}</td>
                        <td>{{ $view_team->lname }}</td>
                        <td>{{ $view_team->position }}</td>
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$view_team->images")}}" alt=""></td>

                        <td><a href="{{ $view_team->facebook }}">Facebook</a></td>
                        <td><a href="{{ $view_team->twitter }}">Twitter</a></td>
                        <td><a href="{{ $view_team->linkedin }}">LinkedIn</a></td>
                        <td>{!! $view_team->body !!}</td>
                        <td>@if ($view_team->status == null)
                          <span class="badge badge-warning"> Not Approved Yet</span>
                        @elseif($view_team->status == 'suspend')
                        <span class="badge badge-danger"> Suspended</span>
                        @elseif($view_team->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_team->status == 'approved')
                        <span class="badge badge-success"> Approved</span>
                        @elseif($view_team->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                       <td><a href="{{ url('admin/editeam/'.$view_team->ref_no) }}"
                        class='btn btn-success'>
                         <i class="far fa-edit"></i>
                     </a></td>

                     <td><a href="{{ url('admin/teamapprove/'.$view_team->ref_no) }}"
                        class='btn btn-info'>
                         <i class="far fa-user"></i>
                     </a></td>

                     <td><a href="{{ url('admin/teamsuspend/'.$view_team->ref_no) }}"
                        class='btn btn-warning'>
                         <i class="far fa-edit"></i>
                     </a></td>
                       
                         
                       <td><a href="{{ url('admin/deleteteam/'.$view_team->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_team->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Team ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Images</th>

                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Linkedin</th>
                        <th>Message</th>
                        <th>Edit</th>
                        <th>Status</th>

                        <th>Approve</th>
                        <th>Suspend</th>
                        <th>Delete</th>
                        <th>Date</th>
                      </tr>
                  </tfoot>
                </table>
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

@include('dashboard.admin.footer')
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
