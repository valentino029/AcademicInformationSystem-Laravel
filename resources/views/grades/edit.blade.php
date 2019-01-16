@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Edit
        <small>Grades</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Grades</li>
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
                      <h3 class="box-title">Edit Grades</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/Grades/update" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                  <input type="hidden" name="id" value="{{ $Grades->id}}" />
                                  
                              </div>
                          <!-- text input -->
                          <div class="form-group">
                            <label>Grade Code</label>
                            <input type="text" name="grade_code" class="form-control" value="{{ $Grades->grade_code}}" placeholder="Enter Grades Code...">

                            <label>Grade Name</label>
                            <input type="text" name="grade_name" class="form-control" value="{{ $Grades->grade_name}}" placeholder="Enter Grades Name...">
                            
                            
                                <div class="form-group">
                                  <label>Semesters</label>
                                  <select name="semesters_id" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">-</option>
                                    @foreach ($Semesters as $item)
                                    
                                  <option value="{{$item->id}}" {{ $item->id == $Grades->semesters_id ? 'selected': ''}}>{{ ucfirst($item->semester_code)}}</option>
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