@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                <p>
                    <a href="{{ url('users/add') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data </a>
                    <hr>
                    <a href="{{ url('users/reset') }}"  onclick="return confirm('Yakin reset semua status pilih user?')" class="btn btn-warning btn-sm btn-flat"> <i class="fa fa-sync"></i> Reset</a>

                    <a href="{{ url('users/verifikasi') }}" onclick="return confirm('Verifikasi semua user?')"  class="btn btn-success btn-sm btn-flat"> <i class="fa fa-check"></i>
                        Verifikasi</a>

                    <a href="{{ url('users/destroy') }}" onclick="return confirm('Hapus semua user?')"  class="btn btn-danger btn-sm btn-flat"> <i class="fa fa-trash"></i> Delete</a>
                </p>
            </div>

            <div class="card">
                <div class="card-header" style="background-color: var(--blue);color: white">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nim/Nis</th>
                                    <th>Jurusan</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td>{{ $dt->nim_nis }}</td>
                                    <td>{{ $dt->jurusan }}</td>
                                    <td>{{ $dt->role->nama }}</td>
                                    <td>
                                        @if ($dt->status_pilih == 0)
                                        <span class="badge badge-danger"> Belum diverifikasi</span>
                                        @else
                                        <span class="badge badge-success"> Sudah diverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('users', $dt->id)}}" id="delete"
                                            class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i>
                                        </a>
                                        @if ($dt->status_pilih == 0)
                                        <a href="{{url('users/verify', $dt->id)}}" id=""
                                            onclick="return confirm('Yakin Verfikasi {{ $dt->name }} ?')" 
                                            class="btn btn-sm btn-flat btn-success"><i class="fa fa-check"></i>
                                        </a>
                                        @else
                                        <button class="btn btn-warning" disabled><i class="fa fa-ban"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nim/Nis</th>
                                    <th>Jurusan</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@else
@include('layouts.404') 
@endif

@endsection
