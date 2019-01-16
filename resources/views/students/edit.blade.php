@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Add
        <small>Student Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Student Data</li>
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
                      <h3 class="box-title">Add Student Data</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/StudentData/update" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                  <input type="hidden" name="id" value="{{ $Students->id}}" />
                              </div>
                          <!-- text input -->
                          <div class="form-group">

                            <label>NIS</label>
                            <input type="text" value="{{$Students->student_nis}}" name="student_nis" class="form-control" placeholder="Enter NIS...">

                            <label>NISN</label>
                            <input type="text" value="{{$Students->student_nisn}}" name="student_nisn" class="form-control" placeholder="Enter NISN...">

                            <label>Name</label>
                            <input type="text" value="{{$Students->student_name}}" name="student_name" class="form-control" placeholder="Enter Name...">

                            <label>Major</label>
                            <select name="student_major" class="form-control" style="width: 100%;">
                            <option>-</option>
                            <option value="{{$Students->student_major}}" {{$Students->student_major == $Students->student_major ? 'selected': '' }}>
                                {{$Students->student_major}} (Selected)</option>
                            <option>Science</option>
                            <option>Social</option>
                            </select>

                            <label>Gender</label>
                            
                            <select name="student_gender" class="form-control" style="width: 100%;">
                                <option>-</option>
                                <option value="{{$Students->student_gender}}" {{$Students->student_gender == $Students->student_gender ? 'selected': '' }}>
                                        {{$Students->student_gender}} (Selected)</option>
                                <option>Male</option>
                                <option>Female</option>
                                </select>

                                <div class="form-group">
                                        <label>User</label>
                                        <select name="users_id" class="form-control select2" style="width: 100%;">
                                                @foreach ($users as $item)
                                            
                                                <option value="{{$item->id}}" {{ $item->id == $Students->users_id ? 'selected': ''}}>{{ ucfirst($item->name)}}</option>
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