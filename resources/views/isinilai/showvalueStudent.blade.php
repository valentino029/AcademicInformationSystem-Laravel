@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
  <h1>
    Study Results
    <a class="btn btn-primary" href="/pdfPrintStudent/{{$data->id}}"> Print </a>

  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
    <li class="active">Study Results</li>
    <li class="active">Show Value</li>
  </ol>
</section>
@endsection
 
@section('content')

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Classroom Code : {{$data->ClassroomsDetails->Classrooms->classroom_code}} </h3><br>
                <h3 class="box-title">Classroom : {{$data->ClassroomsDetails->Classrooms->classroom_name}} </h3><br>
                <h3 class="box-title">Subject : {{$data->ClassroomsDetails->AcademicSubjects->academic_subjects_name}} </h3><br>
                <h3 class="box-title">Teacher : {{$data->ClassroomsDetails->Teachers->teacher_name}} </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      
                      <th>Student Name</th>
                      <th>Daily Assignment</th>
                      <th>Mid-Test</th>
                      <th>Final Test</th>
                      <th>Results</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                   
                    <tr>
                      
                      <td>{{$data->Students->student_name}}</td>
                      <td>{{$data->Tugas}}</td>
                      <td>{{$data->UTS}}</td>
                      <td>{{$data->UAS}}</td>
                      <td>{{$data->Hasil}}</td>
                    </tr>

                   


                    

                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    </div>
  </div>
</section>
@endsection