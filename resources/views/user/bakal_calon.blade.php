@extends('frontend.master')

@section('content')
<div class="container">
    <div class="d-none d-md-block">
        <div class="row about">
            <div class="col-md-8">
                <!-- <div class="d-flex h-100"> -->
                    <div class="justify-content-center align-self-center">
                        <h2 class="text-center">{{ $bakalCalon->count() }} Bakal Calon Ketua</h2>
                        <div class="table table-responsive">
                            <table id="example1" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bakalCalon as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->npa }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="col-md-4">
                <img src="{{ asset('frontend/log.svg') }}" width="100%" alt="">
            </div>
        </div>
    </div>

    <div class="sm-block d-md-none">
        <div class="row about">
            <div class="col-md-8">
                <!-- <div class="d-flex h-100"> -->
                    <div class="justify-content-center align-self-center">
                        <h2 class="text-center">{{ $bakalCalon->count() }} Bakal Calon Ketua</h2>
                        <div class="table table-responsive">
                            <table id="examplePhone" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bakalCalon as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->npa }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="col-md-4">
                <img src="{{ asset('frontend/log.svg') }}" width="100%" alt="">
            </div>
        </div>
    </div>

</div>
@endsection

@push('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<style>
    .merah {
        color: red;
    }
</style>
@endpush

@push('script')
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $("#examplePhone").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

    });
</script>
<script>
    $( ".merah" ).click(function() {
        alert( "Handler for .click() called." );
    });
</script>
@endpush