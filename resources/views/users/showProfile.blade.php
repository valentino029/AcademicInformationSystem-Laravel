@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
        User
        <small>Profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">Profile</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
        <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">User Profile 
                          <a href="{{ route('EditProfile.edit', $users->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit Profile</a>
                      </h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-3">
                          <p align="center">

                              @if (Auth::user()->img_url != null)
                              <img style="width:250px" src="/storage/profile/{{Auth::user()->img_url}}" class="img-circle" alt="User Image">
                              @else
                              <img src="/storage/profile/avatar5.png" class="img-circle" alt="User Image">
                              @endif

                            <a class="users-list-name" href="#">{{ $users->name}}</a>
                            <span class="users-list-date">
                              @foreach ($users->getRoleNames() as $role)
                              <label for="" class="badge badge-info">{{ $role }}</label>
                              @endforeach
                            </span>
                          </p>
                        </div><!-- /.col -->
                        <div class="col-md-8">
                         <table id="#" class="table table-bordered table-hover">                    
                          <tbody>
                          
                            <tr>
                              <td>Name</td> 
                              <td>{{ $users->name}}</td>
                            </tr>
                            <tr>
                              <td>Email</td> 
                              <td>{{$users->email}}</td> 
                            </tr>
                            
                            
                        </tbody>
                        </table>
                        </div><!-- /.col -->
                      </div>
                    </div>
                  </div>
                </div>
        </div>
</section>

@endsection