@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       Academic Years
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">Academic Years</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">
        <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Academic Years Data</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-3">
                          <p align="center"> 
                            <a href="#">{{ $data->year_name}}</a>
                          </p>
                        </div><!-- /.col -->
                        <div class="col-md-8">
                         <table id="#" class="table table-bordered table-hover">                    
                          <tbody>
                            <tr>
                              <td>Academic Years</td> 
                              <td>{{ $data->year_name}}</td>
                            </tr>
                        </tbody>
                        </table>

                        @foreach ($data->semesters as $item)
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Semesters</td>
                                    <td>{{$item->semester_name}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach

                        </div><!-- /.col -->
                      </div>
                    </div>
                  </div>
                </div>
        </div>
</section>
    
@endsection