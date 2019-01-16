@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Add
        <small>Semesters</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Semesters</li>
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
                      <h3 class="box-title">Add Semesters</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="/Semesters/update" method="POST">
                          <div class="box-body">
                              <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                  <input type="hidden" name="id" value="{{ $Semesters->id}}" />
                                  
                              </div>
                          <!-- text input -->
                          <div class="form-group">
                            <label>Semesters Code</label>
                            <input type="text" name="semester_code" class="form-control" value="{{ $Semesters->semester_code}}" placeholder="Enter Semesters Code...">

                            <label>Semesters Name</label>
                            <input type="text" name="semester_name" class="form-control" value="{{ $Semesters->semester_name}}" placeholder="Enter Semesters Name...">
                            
                            
                                <div class="form-group">
                                  <label>Academic Years</label>
                                  <select name="academic_years_id" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">-</option>
                                    @foreach ($AcademicYears as $item)
                                    
                                  <option value="{{$item->id}}" {{ $item->id == $Semesters->academic_years_id ? 'selected': ''}}>{{ ucfirst($item->year_name)}}</option>
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