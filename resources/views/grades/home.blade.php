@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       Grades
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">Grades</li>
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
                             <h3 class="box-title">Grades Table <a href="{{ url('Grades/add')}}" class="btn btn-success" title="Add Data"><i class="fa fa-fw fa-plus"></i></a></h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                             <table id="example1" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>Year</th>
                                 <th>Semester</th>
                                 <th>Grade Code</th>
                                 <th>Grade Name</th>
                                 <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                @php
                                $no = 1;
                                @endphp
                                 @foreach ($data as $Grade)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{$Grade->Semesters->AcademicYears->year_name}}</td>
                                     <td>{{$Grade->Semesters->semester_name}}</td>
                                     <td>{{$Grade->grade_code}}</td>
                                     <td>{{$Grade->grade_name}}</td>
                                     <td>
                                      <a href="/Grades/edit/{{ $Grade->id }}">
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