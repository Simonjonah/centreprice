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
                    <th>Blog ID</th>
                    <th>Title</th>
                   
                    <th>Images</th>
                   
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
                  @foreach ($view_blogs as $view_blog)
                    <tr>
                        <td>{{ $view_blog->ref_no }}</td>
                        <td>{{ $view_blog->title }}</td>
                        
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$view_blog->images")}}" alt=""></td>

                        {{-- <td>{!! $view_blog->messages !!}</td> --}}
                        <td>@if ($view_blog->status == null)
                          <span class="badge badge-warning"> Not Approved Yet</span>
                        @elseif($view_blog->status == 'suspend')
                        <span class="badge badge-danger"> Suspended</span>
                        @elseif($view_blog->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_blog->status == 'approved')
                        <span class="badge badge-success"> Approved</span>
                        @elseif($view_blog->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                       <td><a href="{{ url('admin/ediblog/'.$view_blog->ref_no) }}"
                        class='btn btn-success'>
                         <i class="far fa-edit"></i>
                     </a></td>

                     <td><a href="{{ url('admin/blogapprove/'.$view_blog->ref_no) }}"
                        class='btn btn-info'>
                         <i class="far fa-user"></i>
                     </a></td>

                     <td><a href="{{ url('admin/blogsuspend/'.$view_blog->ref_no) }}"
                        class='btn btn-warning'>
                         <i class="far fa-edit"></i>
                     </a></td>
                       
                         
                       <td><a href="{{ url('admin/deleteblog/'.$view_blog->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>{{ $view_blog->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Blog ID</th>
                        <th>Title</th>
                       
                        <th>Images</th>
                       
                        <th>Status</th>
                        <th>Edit</th>
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
