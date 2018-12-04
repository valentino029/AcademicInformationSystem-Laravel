@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
  <h1>
    Classrooms

  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
    <li class="active">Classrooms</li>
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
                <h3 class="box-title">Classrooms Table </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Classroom Code</th>
                      <th>Academic Subject Name</th>
                      <th>Teacher Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no=1 @endphp 
                    @foreach ($data as $Classroom)
                    <tr>
                      <td>{{$no++}}</td>
                      <td> {{$Classroom->Classrooms->classroom_code}}</td>
                      <td>{{$Classroom->AcademicSubjects->academic_subjects_name}}</td>
                      <td>{{$Classroom->Teachers->teacher_name}}</td>
                      <td><a class="btn btn-primary" href="/value/input/{{$Classroom->id}}"> Input Value </a>
                        <a class="btn btn-primary" href="/value/show/{{$Classroom->id}}"> Show Value </a></td>
                      
                      
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