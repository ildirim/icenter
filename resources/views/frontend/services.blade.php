@extends('frontend.layouts.app')
@section('main')
@php $url = basename(Request::url()); @endphp
@section('title')
@if($url =='training') {{ __('auth.training') }} @elseif($url == 'seyyar') {{ __('auth.seyyarax') }} @elseif($url == 'it') {{ __('auth.itx') }} @endif
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
                        <li class="breadcrump-list-item">@if($url =='training') {{ __('auth.training') }} @elseif($url == 'seyyar') {{ __('auth.seyyarax') }} @elseif($url == 'it') {{ __('auth.itx') }} @endif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- SERVICES -->
    <section id="services">
        <!-- .asan main box -->
        <div class="asan-box">
            @foreach($headservices as $headservice)
            <img class="asan-box-pic wow fadeInDown" src="/storage/services/{{ $headservice->image }}" alt="icenter">
            @endforeach
            <div class="asan-box-title">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="main-title font-gotham-black wow fadeInLeft">
                            @foreach($headservices as $headservice)
                            <span class="blured">{{ $headservice->translate(config('app.locale'))->title1 }}</span> <br>
                            {{ $headservice->translate(config('app.locale'))->title2 }}
                            @endforeach
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="asan-box-body">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="whited font-gotham-thin wow fadeInLeft">
                                @foreach($headservices as $headservice)
                                {!! $headservice->translate(config('app.locale'))->content !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./asan main box -->
        @if($url != 'seyyar' && $url != 'training' && $url != 'it')
        <!-- .asan services box -->
        <div class="asan-services-box">
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="main-title font-gotham-black">@if($url =='training') {{ __('auth.training') }} @elseif($url == 'seyyar') {{ __('auth.seyyarx') }} @elseif($url == 'it') {{ __('auth.itx') }} @endif
                       </h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($contentservices as $contentservice)
                    <div class="col-sm-4 col-md-4">
                        <a href="#">
                            <div class="asan-services-box-item text-center wow flipInX">
                                <h4 class="font-gotham-bold">{{ $contentservice->translate(config('app.locale'))->title }}</h4>
                                <p class="font-gotham-book">
                                    {!! $contentservice->translate(config('app.locale'))->content !!}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!-- ./asan services box -->
    </section>
    <!-- /SERVICES -->
</div>
@endsection