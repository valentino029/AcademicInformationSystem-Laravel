@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
    <h1>
        Users
        <small>Edit Profile Data Page</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li>User Management</li>
        <li class="active">Edit Data</li>
    </ol>
</section>
@endsection
 
@section('content')
<!-- Main content -->
<section class="content">

    <!-- Main row -->
    <div class="row">

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-12 connectedSortable">

            <!-- Donut chart -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-table"></i>

                    <h3 class="box-title">Edit Data</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
                        
                    </div>
                </div>
                <div class="box-body">

                        <form role="form" action="{{ route('EditProfile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name" value="{{$user->name}}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" name="email" value="{{$user->email}}" required>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control {{ $errors->has('img_url') ? 'is-invalid':'' }}" name="img_url" placeholder="img_url">
                                <p class="text-danger">{{ $errors->first('img_url') }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" name="password" placeholder="Password" >
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                        </div>

                                                
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>

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