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
                <h3 class="card-title"><form action="{{ url('admin/createbank') }}" method="post">
                    @csrf
                <button type="submit" class="btn btn-primary">Create Bank</button>
                </form></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Currency</th>
                    <th>Type</th>
                    <th>gateway</th>
                    <th>Long Code</th>
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
                  @foreach ($view_contacts as $view_contact)
                    <tr>
                        <td>{{ $view_contact->name }}</td>
                        <td>{{ $view_contact->code }}</td>
                        <td>{{ $view_contact->currency }}</td>
                        <td>{{ $view_contact->type }}</td>
                        <td>{{ $view_contact->gateway }}</td>
                        <td>{{ $view_contact->longcode }}</td>
                       
                     <td>{{ $view_contact->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Currency</th>
                        <th>Type</th>
                        <th>gateway</th>
                        <th>Long Code</th>
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
