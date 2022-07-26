@extends('frontend.master')

@section('content')

@php
$about = \App\Logo::all();
@endphp
<div class="container">
    <div class="d-none d-md-block">
        <div class="row about">
            <div class="col-md-6">
                <div class="d-flex h-100">
                    <div class="justify-content-center align-self-center">
                        <center>
                            @foreach ($about as $ab)
                            <img src="{{ url('frontend', $ab->photo) }}" width="50%" class="img-brd" alt=""><br>
                            {!! $ab->about !!}
                            @endforeach
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('frontend/log.svg') }}" width="100%" alt="">
            </div>
        </div>
    </div>

    <div class="sm-block d-md-none">
        <div class="row about">
            <div class="col-md-6">
                <div class="d-flex h-100">
                    <div class="justify-content-center align-self-center">
                        <center>
                            @foreach ($about as $ab)
                            <img src="{{ url('frontend', $ab->photo) }}" width="50%" class="img-brd" alt=""><br>
                            {!! $ab->about !!}
                            @endforeach
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('frontend/log.svg') }}" width="100%" alt="">
            </div>
        </div>
    </div>

</div>
@endsection
