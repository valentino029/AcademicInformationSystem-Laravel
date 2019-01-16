@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       Classrooms Detail Student
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="active">Classroom Data</li>
        <li class="active">Show</li>
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
                             <h3 class="box-title">Classrooms Detail Student Table </h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                             <table id="example1" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>Classroom Code</th>
                                 <th>NIS</th>
                                 <th>NISN</th>
                                 <th>Student Name</th>
                                 <th>Gender</th>
                                 <th>Action</th>
                                 
                               </tr>
                               </thead>
                               <tbody>
                                @php
                                $no = 1;
                                @endphp
                                 @foreach ($ClassroomDetailStudents as $row)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{$row->classrooms_details_id}}</td>
                                     <td>{{$row->Students->student_nis}}</a></td>
                                     <td>{{$row->Students->student_nisn}}</a></td>
                                     <td>{{$row->Students->student_name}}</a></td>
                                     <td>{{$row->Students->student_gender}}</a></td>
                                     <td><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete{{ $row->id}}"><i class="fa fa-trash"></i></button></td>
                                     
                                 </tr>
                                 
                                 {{-- modal hapus  --}}
              <div class="modal fade" id="modal-delete{{ $row->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Data ?</h4>
                      </div>
                      
                    <form role="form" action="/ClassroomDetailStudents/delete" method="POST">
                          
                            
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" class="form-control" name="id" value="{{ $row->id}}" />
                              <input type="hidden" name="_method" value="DELETE" />                   
                          
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                      </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal hapus -->

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