@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-5">

                <div class="card card-primary" style="margin-top: 30px">
                    <div class="card-header">
                        <h3 class="card-title">Ganti Profile</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" role="form" method="post"
                            action="{{url('users/ubahprofile', $dt->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{$dt->name}}" required autocomplete="off" autofocus
                                    placeholder="Masukan Nama">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{$dt->email}}" required autocomplete="off" autofocus
                                    placeholder="Masukan E-mail">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-controll" name="photo">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ganti</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card card-primary" style="margin-top: 30px">
                    <div class="card-header">
                        <h3 class="card-title">Ganti Password</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="post" action="{{url('users/ubahpassword', $dt->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                                <input id="oldpassword" type="password"
                                    class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword"
                                    required autocomplete="off" placeholder="Masukan Password Lama">

                                @error('oldpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="off" placeholder="Masukan Password Baru">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="off"
                                    placeholder="Konfirmasi Password Baru">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ganti</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1">

            </div>
        </div>


</section>
<!-- /.content -->
@else
@include('layouts.404')
@endif

@endsection
