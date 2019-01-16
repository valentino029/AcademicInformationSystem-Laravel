@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Add
        <small>Classroom Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Classroom Data</li>
        <li class="active">Input Student</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
        <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add Classroom Detail Data</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/ClassroomDetailStudents/store" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              </div>
                          <!-- text input -->
                          <div class="form-group">
                            
                                <input type="hidden" name="classrooms_details_id" value="{{ $ClassroomDetails->id}}" />
                                                            
                                      <div class="form-group">
                                            <label>Student</label>
                                            <select name="students_id" class="form-control select2" style="width: 100%;">
                                              <option selected="selected">-</option>
                                              @foreach ($Students as $item)
                                            <option value="{{$item->id}}">{{$item->student_nis}} - {{$item->student_name}}</option>
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