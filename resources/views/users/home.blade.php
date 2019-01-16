@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Users
    <small>Users page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-fw fa-home"></i> Home</a></li>
    <li>User Management</li>
    <li class="active">Users</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  
  <!-- Main row -->
  <div class="row">
    
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-12 connectedSortable">
      
      <div class="box box-primary">
          <div class="box-header with-border">
              <i class="fa fa-table"></i>
  
            <h3 class="box-title">Users List
                <a href="{{ route('users.create') }}" class="btn btn-success" title="Add Data"><i class="fa fa-fw fa-plus"></i></a>
            </h3>
  
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
             
            </div>
          </div>
          <div class="box-body">

             <div class="table-responsive">
        {{-- <table id="table" class="table table-striped table-bordered" style="width:100%"> --}}
          <table id="example1" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>IMAGE</td>
                <td>Action</td>
            </tr>
          </thead>
          <tbody>
              @php 
                $no = 1; 
              @endphp
              @forelse ($users as $row)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>
                      @foreach ($row->getRoleNames() as $role)
                      <label for="" class="badge badge-info">{{ $role }}</label>
                      @endforeach
                  </td>
                  <td>{{ $row->img_url }}</td>
                 <td>
                      @if ($role == 'Administrator')
                      
                      <a href="{{ route('users.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      @else
                      <a href="{{ route('users.roles', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-user-secret"></i></a>
                      <a href="{{ route('users.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete{{ $row->id}}"><i class="fa fa-trash"></i></button>
                      @endif
                         
                      
                  </td>
              </tr>
              {{-- modal hapus user --}}
              <div class="modal fade" id="modal-delete{{ $row->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Delete Data ?</h4>
                    </div>
                    
                      <form role="form" action="{{ route('users.destroy', $row->id) }}" method="POST">
                        
                          
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" class="form-control" name="id" value="{{ $row->id}}" />
                            <input type="hidden" name="_method" value="DELETE" />                   
                        
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal hapus nilai-->


              @empty
              <tr>
                  <td colspan="6" class="text-center">Tidak ada data</td>
              </tr>
              @endforelse
          </tbody>
        </table>
        

          </div></div>
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