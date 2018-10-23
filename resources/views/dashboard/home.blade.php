@extends('layouts.master')


@section('title')
<title>Academic Information System</title>
@endsection

@section('content-header')
<section class="content-header">
    <h1>
       Homepage
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        
    </ol>
</section>
@endsection
@section('content')
<section class="content">
	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">IMPORTANT !</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              
              Important data that needs to be prepared include:
                <ul>
                <li>
                1. Curriculum Data</li>
                <li>
                2. Subjects in the curriculum.</li>
                <li>
                3. Department Data</li>
                <li>                
                4. Subject data in the Department</li>
                <li>
                5. Student Data</li>
                <li>
                6. Teacher Data</li>
                <li>
                7. Student registration process</li>
                <li>
                8. Subject registration process</li>
                <li>
                9. Establishment of classrooms for subjects and subject participants</li>
                <li>
                10. Determination of teachers in subjects</li>
                <li>
                11. Process of inputting subject values</li>
                <li>
                12. Determination of access rights for teachers</li>
                <li>
                13. Determination of access rights for students</li>
                </ul>

            </div>
          </div>
        </div>
    </div>

</section>
    
@endsection