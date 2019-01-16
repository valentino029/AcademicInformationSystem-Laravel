@extends('layouts.master') 


@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role Permission
    <small>Role Permission page</small>
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
          <form class="form-horizontal" role="form" action="{{ route('users.add_permission') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Role</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="names" name="name">
                  <p class="text-danger">{{ $errors->first('name') }}</p>
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

      <!-- Donut chart -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-table"></i>

          <h3 class="box-title">Role</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            
          </div>
        </div>
        <div class="box-body">

          <form class="form-horizontal" role="form" action="{{ route('users.roles_permission') }}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Roles</label>

                <div class="col-sm-10">
                  <select name="role" class="form-control">
                              @foreach ($roles as $value)
                                  <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>{{ $value }}</option>
                              @endforeach
                          </select>
                </div>

              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-danger pull-right">Check</button>
            </div>
            <!-- /.box-footer -->
          </form>

          @if (!empty($permissions))
          <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#tab_1" data-toggle="tab">Permissions</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @php $no = 1; 
@endphp @foreach ($permissions as $key => $row)
                    <input type="checkbox" name="permission[]" class="minimal-red" value="{{ $row }}" {{-- CHECK, JIKA PERMISSION TERSEBUT SUDAH
                      DI SET, MAKA CHECKED --}} {{ in_array($row, $hasPermission) ? 'checked': '' }}> {{
                    $row }} <br> @if ($no++%4 == 0)
                    <br> @endif @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="pull-right">
              <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-send"></i> Set Permission
                                        </button>
            </div>
          </form>
          @endif

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