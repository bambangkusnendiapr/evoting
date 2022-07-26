@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id ==2)
<br>
<p>
    <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus"></i>
        Tambah</a>
    <a href="#" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#delmodal"><i class="fa fa-trash"></i> Hapus</a>
    <a href="{{ url('voter/export') }}" class="btn btn-success btn-flat"><i class="fa fa-file-excel"></i> Export</a>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Token Pemilih</th>
                                    <th>Status</th>
                                    <th>Nama Pemilih</th>
                                    <th>Waktu Dibuat</th>
                                    <th>Waktu Kadaluarsa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->username}}</td>
                                    <td>
                                        @if($dt->status_id == 2)
                                        <span class="badge badge-danger"> Belum Voting</span>
                                        @else
                                        <span class="badge badge-success"> Sudah Voting</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($dt->user_id == null)
                                        <span class="badge badge-danger"> No Name</span>
                                        @else
                                        {{$dt->user->name}}
                                        @endif
                                    </td>
                                    <td>{{ date('d F Y H:i:s', strtotime($dt->created_at)) }}</td>
                                    <td>{{ date('d F Y H:i:s', strtotime($dt->valid_until)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Token Pemilih</th>
                                    <th>Status</th>
                                    <th>Nama Pemilih</th>
                                    <th>Waktu Dibuat</th>
                                    <th>Waktu Kadaluarsa</th>
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
    @include('voter.hapus')
</div>
@include('voter.add')
@else
@include('layouts.404')
@endif
@endsection
