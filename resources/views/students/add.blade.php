@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Add
        <small>User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">User Management</li>
        <li class="active">Teacher Account</li>
        <li class="active">Add</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
        <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add User</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/StudentData/store" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              </div>
                          <!-- text input -->
                          <div class="form-group">

                            <label>NIS</label>
                            <input type="text" name="student_nis" class="form-control" placeholder="Enter Level...">

                            <label>NISN</label>
                            <input type="text" name="student_nisn" class="form-control" placeholder="Enter Name...">

                            <label>Name</label>
                            <input type="text" name="student_name" class="form-control" placeholder="Enter Email...">

                            <label>Major</label>
                            <input type="text" name="student_major" class="form-control" placeholder="Enter Email...">

                            <label>Gender</label>
                            <input type="text" name="student_gender" class="form-control" placeholder="Enter Email...">

                            <div class="form-group">
                                <label>User</label>
                                <select name="users_id" class="form-control select2" style="width: 100%;">
                                  <option selected="selected">-</option>
                                  @foreach ($data as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                  
                                </select>
                              </div> 


                          </div>
                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                          
                        </form>
                      </div>
                  </div>
                </div>
        </div>
</section>

@endsection