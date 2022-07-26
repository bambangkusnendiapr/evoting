@extends('layouts.master')

@section('content')

@if(\Auth::user()->role_id ==1 || \Auth::user()->role_id == 2 )
<br>
<a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus"></i> Tambah</a>
<a href="{{ url('candidat/export') }}" class="btn btn-success btn-flat"><i class="fa fa-file-excel"></i> Export</a>
<hr>
<div class="row" style="margin-top: 10px">
    @include('candidat.add')
    @foreach ($kandidat as $key=>$kdt)
    @if ($kdt->category_id == null)
    <div class="col-md-4 mt-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h5 class="text-center">{{ $key+1 }}</h5><hr>
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
    @else

    @endif
    @endforeach

</div>
<div class="row">
    @foreach ($category as $ct)
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $ct->nama }}</h3>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('category/candidat', $ct->id) }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endforeach
</div>
@else
@include('layouts.404')
@endif
@endsection
