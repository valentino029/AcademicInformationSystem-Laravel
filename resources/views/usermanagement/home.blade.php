@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       User Management
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">User Management</li>
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
                             <h3 class="box-title">Academic Years Table <a href="{{ url('UserManagement/add')}}" class="btn btn-success" title="Add Data"><i class="fa fa-fw fa-plus"></i></a></h3>
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
                                @php
                                    $no = 1;
                                @endphp
                                 @foreach ($data as $UM)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td><a href="/UserManagement/{{ $UM->id }}">{{$UM->name}}</a></td>
                                     <td>
                                         <a href="/UserManagement/edit/{{ $UM->id }}">
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