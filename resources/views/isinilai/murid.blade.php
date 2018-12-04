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
                <h3 class="box-title">Kelas : {{$data->Classrooms->classroom_name}} </h3><br>
                <h3 class="box-title">Ruang Kelas : {{$data->Classrooms->classroom_code}} </h3><br>
                <h3 class="box-title">Mata Pelajaran : {{$data->AcademicSubjects->academic_subjects_name}} </h3><br>
                <h3 class="box-title">Pengajar : {{$data->Teachers->teacher_name}} </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Murid</th>
                      <th>Isi Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no=1 @endphp 
                    @foreach ($data->ClassroomDetailStudents as $Classroom)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$Classroom->Students->student_name}}</td>
                      <td>
                        <a class="btn btn-primary" href="/tugas/{{$Classroom->id}}"> TUGAS </a>&nbsp;
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-UTS{{ $Classroom->id}}">
                          UTS {{ $Classroom->id}}
                        </button>&nbsp;
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-UAS{{ $Classroom->id}}">
                          UAS
                        </button>
                        <a class="btn btn-primary" href="/nilaiAkhir/{{$Classroom->id}}"> Proses Nilai Akhir </a>
                      </td>
                    </tr>

                    {{-- modal UTS --}}
                    <div class="modal fade" id="modal-UTS{{ $Classroom->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Isi Nilai {{ $Classroom->id}}</h4>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="/nilaiUTS/update" method="POST">
                              <div class="box-body">
                                <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" class="form-control" name="id" value="{{ $Classroom->id}}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Nilai UTS</label>

                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nilai UTS" name="UTS">
                                  </div>
                                </div>

                              </div>
                              <!-- /.box-body -->

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    {{-- modal UAS --}}
                    <div class="modal fade" id="modal-UAS{{ $Classroom->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Isi Nilai</h4>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="/nilaiUAS/update" method="POST">
                              <div class="box-body">
                                <div class="form-group">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" class="form-control" name="id" value="{{ $Classroom->id}}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Nilai UAS</label>

                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nilai UAS" name="UAS">
                                  </div>
                                </div>

                              </div>
                              <!-- /.box-body -->

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


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