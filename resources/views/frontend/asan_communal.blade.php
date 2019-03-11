@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.easycommunal') }}
@endsection
<!-- page-wrapper -->
<div class="page-wrapper">
    <!-- .top-cover -->
    <div class="top-cover wow fadeInDown"></div>
    <!-- ./top-cover -->    <!-- breadcrump -->
    <div class="breadcrump">
        <div class="container container-icenter">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrump-list font-gotham-light">
                        <li class="breadcrump-list-item"><a href="/{{ $find }}">{{ __('auth.homepage') }} </a></li>
                        <li class="breadcrump-list-item">{{ __('auth.service') }} ></li>
                        <li class="breadcrump-list-item">{{ __('auth.easycommunal') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- ASAN COMMUNAL -->
    <section id="asan-communal" class="isection">
        <!-- .asan main box -->
        <div class="asan-box">
            <img class="asan-box-pic wow fadeInDown" src="/storage/services/{{ $headcommunal->image }}" alt="icenter">
            <div class="asan-box-title">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="main-title font-gotham-black wow fadeInLeft">
                            <span class="blured">{{ $headcommunal->translate(config('app.locale'))->title1 }}</span> <br>
                            {{ $headcommunal->translate(config('app.locale'))->title2 }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="asan-box-body blured-back">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="whited font-gotham-thin wow fadeInLeft">
                                {!! $headcommunal->translate(config('app.locale'))->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./asan main box -->
        <div class="azer-communal">
            <div class="container container-icenter">
                <div class="row flex flex-middle">
                    @foreach($easysponsors as $easysponsor)
                    <div class="azer-com-pic">
                        <img src="/storage/services/{{ $easysponsor->image }}" alt="icenter azer communal" class="wow fadeInDown">
                        <p class="font-gotham-medium wow fadeInUp">
                            {{ $easysponsor->translate(config('app.locale'))->title }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /ASAN COMMUNAL -->
</div>
@endsection