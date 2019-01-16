@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Edit
        <small>Academic Subjects</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Academic Subjects</li>
        <li class="active">Edit</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
        <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Edit Academic Subjects</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/AcademicSubjects/update" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                  <input type="hidden" name="id" value="{{ $AcademicSubjects->id}}" />
                                  
                              </div>
                          <!-- text input -->
                          <div class="form-group">
                            <label>Academic Subjects Code</label>
                            <input type="text" name="academic_subjects_code" class="form-control" value="{{ $AcademicSubjects->academic_subjects_code}}" placeholder="Enter Academic Subjects Code...">

                            <label>Academic Subjects Name</label>
                            <input type="text" name="academic_subjects_name" class="form-control" value="{{ $AcademicSubjects->academic_subjects_name}}" placeholder="Enter Academic Subjects Name...">
                            
                            
                                <div class="form-group">
                                  <label>Majors</label>
                                  <select name="majors_id" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">-</option>
                                    @foreach ($Majors as $item)
                                    
                                  <option value="{{$item->id}}" {{ $item->id == $AcademicSubjects->majors_id ? 'selected': ''}}>{{ ucfirst($item->major_code)}}</option>
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