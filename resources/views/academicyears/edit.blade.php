@extends('layouts.master')
@section('title')
<title>Academic Information System</title>
@endsection
 @section('content-header')
<section class="content-header">
    <h1>
        Edit
        <small>Academic Years</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Academic Years</li>
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
                      <h3 class="box-title">Edit Academic Years</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <form role="form" action="/AcademicYears/update" method="POST">
                      <div class="box-body">
                          <div class="form-group">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" class="form-control" name="id" value="{{ $data->id}}" />
                              <input type="hidden" name="_method" value="PUT"/>
                          </div>
                          <!-- text input -->
                          <div class="form-group">
                            <label>Academic Years Code</label>
                            <input type="text" class="form-control" name="year_code" value="{{ $data->year_code}}" placeholder="Academic Year Code">
                        </div>

                        <div class="form-group">
                          <label>Academic Years Name</label>
                          <input type="text" class="form-control" name="year_name" value="{{ $data->year_name}}" placeholder="Academic Year Name">
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