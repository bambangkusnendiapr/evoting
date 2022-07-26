@extends('frontend.master')


@section('content')
<?php
date_default_timezone_set('Asia/Jakarta');
$jam=date("G");
if($jam>=0&&$jam<=11)
$sapa="Selamat Pagi,";
else if($jam>=12&&$jam<=15)
$sapa="Selamat Siang,";
else if($jam>=16&&$jam<=18)
$sapa="Selamat Sore,";
else if($jam>=19&&$jam<=23)
$sapa="Selamat Malam,";

$logo = \App\Logo::all();
?>
<div class="container">
    <div class="d-none d-md-block">
        <div class="row desktop">
            <div class="col-md-6">
                <div class="d-flex h-100">
                    <div class="justify-content-center align-self-center">
                        @foreach ($logo as $lg)
                        <center>
                            <img src="{{ url('frontend', $lg->photo) }}" width="50%" class="img-brd" alt="">
                            <h5 class="mt-3"><strong>Hallo, {{ $sapa }}</strong></h5>
                            <p>Silahkan Daftar untuk mendapatkan <strong>Token</strong>.
                            </p>
                        </center>
                        @endforeach
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card brd">
                    <div class="card-body register-card-body">
                        <h3 class="text-center"> {{ $title }}</h3>
                        <hr>
                        @if ($message = \Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="sukses">
                            <p>{{ $message }} <a href="{{ 'login' }}">login</a> untuk membuat token pemilihan</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if ($message = \Session::get('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p><strong>Gagal !</strong>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form method="POST" action="{{ url('daftar/add') }}#sukses">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="off" 
                                    placeholder="Nama Lengkap">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="nim_nis" type="text"
                                    class="form-control @error('nim_nis') is-invalid @enderror" name="nim_nis"
                                    value="{{ old('nim_nis') }}" required autocomplete="off"
                                    placeholder="NPA">

                                @error('nim_nis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="jurusan" type="text"
                                    class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                                    value="{{ old('jurusan') }}" required autocomplete="off"
                                    placeholder="PC / PD / PW">

                                @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" 
                                    placeholder="E-mail address">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="off" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="off"
                                    placeholder="Konfirmasi Password">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="icheck-primary">
                                        <p class="mt-3">Sudah Punya akun? <a href="{{url('login')}}">
                                                Login</a></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    <div class="sm-block d-md-none">
        <div class="row desktop">
            <div class="col-md-6">
                <div class="d-flex h-100">
                    <div class="justify-content-center align-self-center">
                        @foreach ($logo as $lg)
                        <center>
                            <img src="{{ url('frontend', $lg->photo) }}" width="50%" class="img-brd" alt="">
                            <h5 class="mt-3"><strong>Hallo, {{ $sapa }}</strong></h5>
                            <p>Silahkan Daftar untuk mendapatkan <strong>Token</strong>.
                            </p>
                        </center>
                        @endforeach
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-5">
                    <div class="card-body register-card-body">
                        <center><img src="{{ asset('adminlte/voting.png') }}" style="height: 120px;width: 150px" alt="" id="suksess">
                        </center>
                        <hr>
                        @if ($message = \Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                             <p>{{ $message }} <a href="{{ 'login' }}">login</a> untuk membuat token pemilihan</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <hr>
                        <form method="POST" action="{{ url('daftar/add') }}#suksess">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="off" 
                                    placeholder="Nama Lengkap">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="nim_nis" type="text"
                                    class="form-control @error('nim_nis') is-invalid @enderror" name="nim_nis"
                                    value="{{ old('nim_nis') }}" required autocomplete="off" 
                                    placeholder="NPA">

                                @error('nim_nis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="jurusan" type="text"
                                    class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                                    value="{{ old('jurusan') }}" required autocomplete="off" 
                                    placeholder="PC / PD / PW">

                                @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" 
                                    placeholder="E-mail Address">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="off" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="off"
                                    placeholder="Konfirmasi Password">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="icheck-primary">
                                        <p class="mt-3">Sudah Punya akun? <a href="{{url('login')}}">
                                                Login</a></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
