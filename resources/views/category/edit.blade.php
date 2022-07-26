@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row mt-2">
    <div class="col-md-12">
        <div class="box box-warning">
            <!-- general form elements -->
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ url('category/ubah', $dt->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                       <div class="form-group">
                            <label for="exampleInputEmail1">Nama Category</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ $dt->nama }}" name="nama" id="exampleInputEmail1"
                                placeholder="Masukan Nama">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
@include('layouts.404')
@endif
@endsection
