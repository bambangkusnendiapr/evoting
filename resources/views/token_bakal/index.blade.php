@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id ==2)
<br>
<p>
    <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus"></i>
        Tambah</a>
    <a href="#" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#delmodal"><i class="fa fa-trash"></i> Hapus</a>
    <a href="{{ route('token.bakal.export') }}" class="btn btn-success btn-flat"><i class="fa fa-file-excel"></i> Download Excel</a>
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
                                    <th>Token</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->token}}</td>
                                    <td>
                                        @if($dt->status == 'belum voting')
                                        <span class="badge badge-danger"> Belum Voting</span>
                                        @else
                                        <span class="badge badge-success"> Sudah Voting</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Token</th>
                                    <th>Status</th>
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
    @include('token_bakal.hapus')
</div>
@include('token_bakal.add')
@else
@include('layouts.404')
@endif
@endsection