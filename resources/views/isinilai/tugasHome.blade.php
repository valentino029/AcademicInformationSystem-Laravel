@extends('layouts.master') 
@section('title')
<title>Academic Information System</title>
@endsection
 
@section('content-header')
<section class="content-header">
  <h1>
    Daily Assignment

  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
    <li class="active">Study Results</li>
    <li class="active">Input Value</li>
    <li class="active">Daily Assignment</li>
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
                <h3 class="box-title">Daily Assignment Table <a href="/tugas/add/{{$data->id}}" class="btn btn-success" title="Add Data"><i class="fa fa-fw fa-plus"></i></a>
                  
                </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name of Assignment</th>
                      <th>Value</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no=1 @endphp 
                    @foreach ($data->tugas as $row)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$row->nama_tugas}}</td>
                      <td>{{$row->nilai}}</td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{ $row->id}}">
                          Edit 
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $row->id}}">
                          Delete 
                        </button>
                    </tr>
                    {{-- modal Edit nilai --}}
                    <div class="modal fade" id="modal-edit{{ $row->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Nilai {{ $row->id}}</h4>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="/tugas/update" method="POST">
                              <div class="box-body">
                                
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" class="form-control" name="id" value="{{ $row->id}}" />
                                  <input type="hidden" name="_method" value="PUT" />
                                

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-4 control-label">Nama Tugas</label>

                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$row->nama_tugas}}"  name="nama_tugas">
                                  </div>
                                </div><br><br>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-4 control-label">Nilai</label>

                                  <div class="col-sm-8">
                                    <input type="number" min="0" max="100" class="form-control" value="{{$row->nilai}}" name="nilai">
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
                    <!-- /.modal edit nilai-->

                    {{-- modal hapus nilai --}}
                    <div class="modal fade" id="modal-delete{{ $row->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete Data ?</h4>
                          </div>
                          
                            <form role="form" action="/tugas/delete" method="POST">
                              
                                
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
                    <!-- /.modal hapus nilai-->

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