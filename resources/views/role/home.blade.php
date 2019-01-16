@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role
    <small>Role page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-fw fa-home"></i> Home</a></li>
    <li>User Management</li>
    <li class="active">Role</li>
  </ol>
</section>
@endsection
 
@section('content')

<!-- Main content -->
<section class="content">

  <!-- Main row -->
  <div class="row">

    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-6 connectedSortable">

      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-table"></i>

          <h3 class="box-title">Add Role</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            
          </div>
        </div>
        <div class="box-body">

          <!-- form start -->
          <form class="form-horizontal" role="form" action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Role</label>

                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="names" required>
                </div>

              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Add</button>
            </div>
            <!-- /.box-footer -->
          </form>

        </div>
        <!-- /.box-body-->
      </div>
      <!-- /.box -->

    </section>
    <!-- right col -->

    <section class="col-lg-6 connectedSortable">

      
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-table"></i>

          <h3 class="box-title">List Role</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive">
            {{--
            <table id="table" class="table table-striped table-bordered" style="width:100%"> --}}
              <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Role</td>
                    <td>Guard</td>
                    <td>Created At</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  @php
                   $no = 1; 
                  @endphp 
                  @forelse ($role as $row)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->guard_name }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                      <form action="{{ route('role.destroy', $row->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                  </tr>
                  @endforelse

                </tbody>

              </table>

          </div>
          <div class="float-right">
            {!! $role->links() !!}
          </div>

        </div>
        <!-- /.box-body-->
      </div>
      <!-- /.box -->

    </section>
    <!-- right col -->

  </div>
  <!-- /.row (main row) -->

</section>
<!-- /.content -->
@endsection