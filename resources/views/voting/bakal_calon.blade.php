<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VOTING PILIH BAKAL CALON KETUA</title>
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
                    <h5><i class="icon fas fa-users"></i> DAFTAR BAKAL CALON KETUA</h5>
                </center>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NPA</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kandidat as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->npa }}</td>
                                            <td>
                                                <a href="{{ route('simpan.suara.bakal.calon', $data->id) }}" class="btn btn-success btn-block"
                                                    style="width:100%"
                                                    onclick="return confirm('Yakin memilih {{ $data->nama}} ?');"><b></b><i
                                                    class="fa fa-vote-yea"> Pilih</i> </a>
                                            </th>
                                        </tr>
                                        @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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