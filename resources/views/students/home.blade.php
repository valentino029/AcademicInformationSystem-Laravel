@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       Students
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">Students</li>
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
                             <h3 class="box-title">Students Data Table <a href="{{ url('StudentData/add')}}" class="btn btn-success" title="Add Data"><i class="fa fa-fw fa-plus"></i></a></h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                             <table id="example1" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>NIS</th>
                                 <th>NISN</th>
                                 <th>Student Name</th>
                                 <th>Major</th>
                                 <th>Gender</th>
                                 <th>Action</th>
                                 
                               </tr>
                               </thead>
                               <tbody>
                                @php
                                $no = 1;
                                @endphp
                                 @foreach ($data as $Students)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{$Students->student_nis}}</td>
                                     <td>{{$Students->student_nisn}}</td>
                                     <td>{{$Students->student_name}}</td>
                                     <td>{{$Students->student_major}}</td>
                                     <td>{{$Students->student_gender}}</td>
                                     <td>
                                        <a href="/StudentData/edit/{{ $Students->id }}">
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