@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)

@section('css')
    
@endsection

<div class="alert alert-info alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fas fa-info"></i> Info!</h6>
    <small style="font-size: 14px">Jika dalam pemilihannya dibutuhkan Registrasi terlebih dahulu, Berikut linknya : <strong>{{ url('daftar') }}</strong> </small>
</div>

<div class="row mt-3">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ count($kandidat) }}</h3>

                <p>Jumlah Kandidat</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $jumlahhaksuara }}</h3>
                <p>Jumlah Pemilih</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $sudahvoting }}</h3>
                <p>Sudah Voting</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $belumvoting }}</h3>
                <p>Belum Voting</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row mt-2">
    <div class="col-md-12">
        <div style="width: 100%">
            {!! $usersChart->container() !!}
        </div>
    </div>
</div>

@else

<div class="container">
    <center>
        @if (\Auth::user()->status_pilih == 1)
        <form role="form" enctype="multipart/form-data" method="post" action="{{url('user/voter/tambah')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" value="1" name="jumlah" id="exampleInputEmail1" hidden
                        placeholder="Masukan Jumlah Pemilih" autocomplete="off">
                </div>
                <div class="alert alert-default mt-4" style="border-color: green">
                    <p><strong>Selamat <strong>{{ \Auth::user()->name }}, </strong><br>
                            <p style="color: green">Akun Anda sudah di Verifikasi !!</p>
                            <hr>Silahkan klik tombol "
                            Buat Token " di bawah ini untuk mendapatkan <br> Token pemilihan
                        </strong></p>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Buat Token</button>
                </div>
            </div>
        </form>
        @endif

        @if(\Auth::user()->status_pilih == 2)
        <div class="alert alert-default mt-4" style="border-color: red">
            <strong>Hore {{\Auth::user()->name}} !! Token berhasil dubuat. <br>
                Token ini hanya bisa dipakai satu kali</strong>
            <form>
                <div class="form-group">
                    <h3> Token : <br> <br>
                        @foreach ($pemilih as $item)
                        <input type="text" class="form-control center" autocomplete="off" value="{{$item->username}}">
                        <small style="color: red" class="mt-2">Berlaku sampai : {{ date('d F Y H:i:s', strtotime($item->valid_until)) }}</small>
                </div>
                @endforeach
                </h3>
                <p>Silahkan Copy Token di atas untuk melakukan pemilihan </p>
                <a class="btn btn-primary mt-3" href="{{ url('user/voting_login') }}"> Klik Disini Untuk Memilih</a>
                <hr>
            </form>
        </div>
        @endif

        @if (\Auth::user()->status_pilih == 0)
        <div class="alert alert-info mt-2">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <h5> Hallo {{ \Auth::user()->name }}, <br>Akun Anda belum di verifikasi oleh Panitia. <br>
                Tunggu sampai akun anda diverifikasi. Terimakasih.</h5>
        </div>
        @endif

        <center>
</div>

@endif
@endsection

@section('scripts')
{!! $usersChart->script() !!}
@endsection

