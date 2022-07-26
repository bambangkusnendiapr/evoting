@extends('layouts.master')

@section('content')

@if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)
<!-- Main content -->
<section class="content" style="margin-top : 20px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="{{ url('kandidat', $detail->photo) }}" alt="" width="100%">
                        </div>
                        <hr>
                        <h3 class="profile-username text-center">{{$detail->nama}}</h3>
                        <hr>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Visi &
                                    Misi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit
                                    Kandidat</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <h4>Visi :</h4>
                                    <div class="form-group">
                                        {!! $detail->visi !!}
                                    </div>
                                    <hr>
                                    <h4> Misi :</h4>
                                    <div class="form-group">
                                        {!! $detail->misi !!}
                                    </div>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- Post -->
                                <div class="post">
                                    <form role="form" enctype="multipart/form-data" method="post"
                                        action="{{url('candidat/edit', $detail->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Calon</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ $detail->nama }}" placeholder="Nama Calon"
                                                autocomplete="off">
                                            <p>*Wajib di isi</p>
                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Photo</label>
                                            <input type="file" name="photo"
                                                class="form-control @error('photo') is-invalid @enderror">
                                            <p>* Max 2 Mb</p>
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for=""> Visi</label>
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="visi"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                         {{ $detail->visi }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for=""> Misi</label>
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="misi"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                         {{ $detail->misi }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <button type="submit" class="btn btn-primary btn-block">Edit</button>
                                    </form>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@else
@include('layouts.404')
@endif

@endsection
