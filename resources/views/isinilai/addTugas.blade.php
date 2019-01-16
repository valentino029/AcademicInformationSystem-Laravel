@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
    <h1>
        Add
        <small>Daily Assignment</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Daily Assignment</li>
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
                    <h3 class="box-title">Add Daily Assignment</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="/tugas/store" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="classroom_detail_students" value="{{ $data->id}}">
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Tugas</label>
                                <input type="text" name="nama_tugas" class="form-control" placeholder="Enter Nama Tugas">

                                <label>Nilai</label>
                                <input type="number" name="nilai" class="form-control" placeholder="Enter Nilai" min="0" max="100">
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