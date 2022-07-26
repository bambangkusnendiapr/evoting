<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VOTING PILIH</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/yuda.css') }}">
</head>

<body style="background-image: url('{{ asset('frontend/bg.png')}}');
 background-repeat: no-repeat;background-size: cover">
    <section class="container">
        <div class="container-fluid">
            <div class="alert alert-warning" style="margin-top: 20px">
                <center>
                    <h5><i class="icon fas fa-users"></i> DAFTAR KANDIDAT </h5>
                </center>
            </div>
            <div class="row" style="margin-top: 10px">
                @foreach ($kandidat as $key=>$kdt)
                @if ($kdt->category_id == null)
                <div class="col-md-4 mt-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <h5 class="text-center">{{ $key+1 }}</h5>
                            <div class="text-center">
                                <img src="{{ url('kandidat', $kdt->photo) }}" width="100%" alt="">
                            </div>
                            <hr>

                            <h3 class="profile-username text-center">{{ $kdt->nama }}</h3>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ url('voting/detail', $kdt->id) }}"
                                        class="btn btn-primary btn-block"><b><i class="fa fa-list"></i> Detail</b></a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('simpan_suara', $kdt->id) }}" class="btn btn-success btn-block"
                                        style="width:100%"
                                        onclick="return confirm('Yakin memilih {{ $kdt->nama}} ?');"><b></b><i
                                            class="fa fa-vote-yea"> Pilih</i> </a>
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
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h5>{{ $ct->nama }}</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('category/kandidat', $ct->id) }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

     <div class="container">
        <footer>
            <div class="footer">
                <p class="text-white"><i class="fa fa-copyright" aria-hidden="true"></i> Copyrigth by | <strong class="text-white">Yuda
                        Muhtar</strong></p>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

</body>

</html>
