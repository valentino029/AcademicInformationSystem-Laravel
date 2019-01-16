@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
  <h1>
    Study Results
    <a class="btn btn-primary" href="/pdfPrint/{{$data->id}}"> Print </a>

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
                <h3 class="box-title">Classroom Code : {{$data->Classrooms->classroom_code}} </h3><br>
                <h3 class="box-title">Classroom : {{$data->Classrooms->classroom_name}} </h3><br>
                <h3 class="box-title">Subject : {{$data->AcademicSubjects->academic_subjects_name}} </h3><br>
                <h3 class="box-title">Teacher : {{$data->Teachers->teacher_name}} </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Student Name</th>
                      <th>Daily Assignment</th>
                      <th>Mid-Test</th>
                      <th>Final Test</th>
                      <th>Results</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no=1 @endphp 
                    @foreach ($data->ClassroomDetailStudents as $Classroom)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$Classroom->Students->student_name}}</td>
                      <td>{{$Classroom->Tugas}}</td>
                      <td>{{$Classroom->UTS}}</td>
                      <td>{{$Classroom->UAS}}</td>
                      <td>{{$Classroom->Hasil}}</td>
                    </tr>

                   


                    @endforeach

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