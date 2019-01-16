@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
  <h1>
    Study Results

  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
    <li class="active">Study Results</li>
    <li class="active">Input Value</li>
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
                      <th>Student</th>
                      <th>Input Value</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no=1 @endphp 
                    @foreach ($data->ClassroomDetailStudents as $Classroom)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$Classroom->Students->student_name}}</td>
                      <td>
                        <a class="btn btn-primary" href="/tugas/{{$Classroom->id}}"> Daily Assignment </a>&nbsp;
                        @if ($Classroom->UTS == null)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-inputUTS{{ $Classroom->id}}">
                          Mid-Test
                        </button>&nbsp;
                        @else
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-updateUTS{{ $Classroom->id}}">
                            Edit Mid-Test 
                          </button>&nbsp;
                        @endif

                        @if ($Classroom->UAS == null)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-inputUAS{{ $Classroom->id}}">
                          Final Test
                        </button>&nbsp;
                        @else
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-updateUAS{{ $Classroom->id}}">
                            Edit Final Test 
                          </button>&nbsp;
                        @endif

                        @if ($Classroom->UTS != null && $Classroom->UAS != null)
                        <a class="btn btn-primary" href="/nilaiAkhir/{{$Classroom->id}}"> Final Value Process </a>
                        @endif
                        
                        
                        
                      </td>
                    </tr>

                    {{-- modal UTS --}}
                    <div class="modal fade" id="modal-inputUTS{{ $Classroom->id}}">
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
                                    <input type="number" min="0" max="100" class="form-control" placeholder="Nilai UTS" name="UTS">
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

                    {{-- modal UTS --}}
                    <div class="modal fade" id="modal-updateUTS{{ $Classroom->id}}">
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
                                    <input type="number" min="0" max="100" class="form-control" value="{{ $Classroom->UTS}}" name="UTS">
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
                    <div class="modal fade" id="modal-inputUAS{{ $Classroom->id}}">
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
                                    <input type="number" min="0" max="100" class="form-control" id="inputEmail3" placeholder="Nilai UAS" name="UAS">
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
                    <div class="modal fade" id="modal-updateUAS{{ $Classroom->id}}">
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
                                    <input type="number" min="0" max="100" class="form-control" id="inputEmail3" value="{{ $Classroom->UAS}}" name="UAS">
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