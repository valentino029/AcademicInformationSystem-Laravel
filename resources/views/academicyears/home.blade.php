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
                 <section class="content">
                     <div class="row">
                       <div class="col-xs-12">
                         <div class="box">
                           <div class="box-header">
                             <h3 class="box-title">Academic Years Table <a href="/departement/tambah/" class="btn btn-success" title="Tambah Data"><i class="fa fa-fw fa-plus"></i></a></h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                             <table id="example1" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>Academic Years</th>
                                 <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               
                                 @foreach ($data as $AY)
                                 <tr>
                                     <td>{{$AY->id}}</td>
                                     <td><a href="/AcademicYears/{{ $AY->id }}">{{$AY->year_name}}</a></td>
                                     <td>
                                         <a href="/AcademicYears/edit/{{ $AY->id }}">
                                             <button class="btn-primary">Edit</button>
                                         </a>
                                         <a href="/AcademicYears/edit/{{ $AY->id }}">
                                             <button class="btn-danger">Delete</button>
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