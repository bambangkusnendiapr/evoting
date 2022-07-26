@extends('layouts.master')

@section('content')

@if(\Auth::user()->role_id ==1 || \Auth::user()->role_id == 2 )
<br>
<a href="{{ url('candidat/export') }}" class="btn btn-success"><i class="fa fa-file-excel"></i> Export</a>
<hr>
<div class="row" style="margin-top: 10px">
    @if ($category->kandidats->count() > 0 )
    @foreach ($category->kandidats as $key=>$kdt)
    <div class="col-md-4 mt-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h5 class="text-center">{{ $key+1 }}</h5>
                <hr>
                <div class="text-center">
                    <img src="{{ url('kandidat', $kdt->photo) }}" width="100%" alt="">
                </div>
                <hr>

                <h3 class="profile-username text-center">{{ $kdt->nama }}</h3>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ url('candidat/detail', $kdt->id) }}" class="btn btn-primary btn-block"><b><i
                                    class="fa fa-list"></i> Detail</b></a>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('candidat/hapus', $kdt->id) }}"
                            class="btn btn-danger btn-block btn-hapus"><b></b><i class="fa fa-trash"> Hapus</i> </a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    @endforeach
    @else
    <center>
        <h5> Ups! Kandidat {{ $category->nama }} tidak ditemukan !</h5>
    </center>
    @endif



</div>

@else
@include('layouts.404')
@endif
@endsection
