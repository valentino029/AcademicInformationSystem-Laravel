@extends('layouts.master') 


@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Role Edit
        <small>Role page</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">Roles Edit</li>
    </ol>
</section>
@endsection
 
@section('content')

<!-- Main content -->
<section class="content">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">

            <!-- Donut chart -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-table"></i>

                    <h3 class="box-title">Set Role</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                       
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('users.set_role', $user->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT"> @if (session('success')) @alert(['type' => 'success'])
                        {{ session('success') }} @endalert @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <td>:</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>:</td>
                                        <td>
                                            @foreach ($roles as $row)
                                            <input type="radio" name="role" {{ $user->hasRole($row) ? 'checked':'' }} value="{{
                                            $row }}"> {{ $row }} <br> @endforeach
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm float-right">
                                Set Role
                            </button>

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