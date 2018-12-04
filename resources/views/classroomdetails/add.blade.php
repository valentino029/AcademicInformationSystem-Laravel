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
                      <h3 class="box-title">Add Classroom Detail Data</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/ClassroomDetails/store" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              </div>
                          <!-- text input -->
                          <div class="form-group">
                            
                            
                                <div class="form-group">
                                  <label>Classrooms</label>
                                  <select name="classrooms_id" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">-</option>
                                    @foreach ($Classrooms as $item)
                                  <option value="{{$item->id}}">{{$item->classroom_code}}</option>
                                    @endforeach
                                    
                                  </select>
                                </div> 

                                <div class="form-group">
                                        <label>Academic Subject</label>
                                        <select name="academic_subjects_id" class="form-control select2" style="width: 100%;">
                                          <option selected="selected">-</option>
                                          @foreach ($AcademicSubjects as $item)
                                        <option value="{{$item->id}}">{{$item->academic_subjects_code}}</option>
                                          @endforeach
                                          
                                        </select>
                                      </div> 

                                      <div class="form-group">
                                            <label>Teachers</label>
                                            <select name="teachers_id" class="form-control select2" style="width: 100%;">
                                              <option selected="selected">-</option>
                                              @foreach ($Teachers as $item)
                                            <option value="{{$item->id}}">{{$item->teacher_name}}</option>
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