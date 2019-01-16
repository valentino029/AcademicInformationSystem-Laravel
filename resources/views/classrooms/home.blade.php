@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       Classroom Management
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">Classroom Management</li>
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
                             <h3 class="box-title">Classroom Management Table <a href="{{ url('Classrooms/add')}}" class="btn btn-success" title="Add Data"><i class="fa fa-fw fa-plus"></i></a></h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                             <table id="example1" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>Years</th>
                                 <th>Semesters</th>
                                 <th>Grades</th>
                                 <th>Majors</th>
                                 <th>Classrooms Code</th>
                                 <th>Classrooms Name</th>
                                 <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>

                                @php
                                    $no = 1;
                                @endphp
                                 @foreach ($data as $Classrooms)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{$Classrooms->Majors->Grades->Semesters->AcademicYears->year_name}}</td>
                                     <td>{{$Classrooms->Majors->Grades->Semesters->semester_name}}</td>
                                     <td>{{$Classrooms->Majors->Grades->grade_name}}</td>
                                     <td>{{$Classrooms->Majors->major_name}}</td>
                                     <td>{{$Classrooms->classroom_code}}</td>
                                     <td>{{$Classrooms->classroom_name}}</td>
                                     <td>
                                      <a href="/Classrooms/edit/{{ $Classrooms->id }}">
                                          <button class="btn-primary">Edit</button>
                                      </a>  
                                     </td>
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