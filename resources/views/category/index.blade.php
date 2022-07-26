@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                <p>
                    <a href="{{url('category/add')}}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
                <p>Note : Jika dalam proses voting nya membutuhkan Kategori, silahkan tambah data kategori, <strong>jika
                        tidak kosongkan saja</strong></p>
            </div>
            <hr>

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
                                    <th>Created</th>
                                    <th>updated</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{ date('d F Y', strtotime($dt->created_at)) }}</td>
                                    <td>{{ date('d F Y', strtotime($dt->updated_at)) }}</td>
                                    <td>
                                        <a href="{{url('category/edit',$dt->id)}}" id="edit"
                                            class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i> </a>
                                        <a href="{{url('category/delete', $dt->id)}}" id="delete"
                                            class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Created</th>
                                    <th>updated</th>
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
