@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id ==2)
<br>
<p>
    <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus"></i>
        Tambah</a>
    <a href="#" class="btn btn-success btn-flat" data-toggle="modal" data-target="#uploadmodal"><i class="fa fa-file-excel"></i> Upload Bakal Calon Ketua</a>
    <a href="{{ route('export.bakal') }}" class="btn btn-success btn-flat"><i class="fa fa-file-excel"></i> Download Template</a>
</p>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="card">
                <div class="card-header" style="background-color: var(--blue);color: white">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example1" class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NPA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bakalCalon as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{$dt->npa}}</td>
                                    <td>
                                        <form action="{{ route('bakal.destroy', $dt->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editmodal{{$dt->id}}">edit</button>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus ?')">hapus</button>
                                            </div>
                                        </form>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @include('voter.hapus')
</div>

<!-- Modal Edit -->
@foreach($bakalCalon as $data)
<div class="modal fade" id="editmodal{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Bakal Calon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="{{ route('bakal.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ $data->nama }}" required autocomplete="off">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control  @error('npa') is-invalid @enderror"
                                name="npa" required value="{{ $data->npa }}">
                            @error('npa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@include('bakal_calon.add')
@include('bakal_calon.upload')
@else
@include('layouts.404')
@endif
@endsection