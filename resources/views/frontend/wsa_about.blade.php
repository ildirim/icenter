@extends('frontend.layouts.app')
@section('main')
@php $url = basename(Request::url()); @endphp
@section('title')
@if($url =='about') {{ __('auth.wsaabout') }} @elseif($url == 'context') {{ __('auth.wsacontext') }} @endif
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
                        <li class="breadcrump-list-item">WSA ></li>
                        <li class="breadcrump-list-item">@if($url =='about') {{ __('auth.wsaabout') }} @elseif($url == 'context') {{ __('auth.wsacontext') }} @endif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- SERVICES -->
    <section id="services">
        <!-- .asan main box -->
        <div class="asan-box">
            @foreach($headwsaabconts as $headwsaabcont)
            <img class="asan-box-pic wow fadeInDown" src="/storage/wsa/{{ $headwsaabcont->image}}" alt="icenter">
            @endforeach
            <div class="asan-box-title">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="main-title font-gotham-black wow fadeInLeft">
                                @php $url = basename(Request::url()); @endphp
                                <span class="blured">@if($url =='about') {{ mb_strtoupper(__('auth.wsaabout')) }} @elseif($url == 'context') {{ mb_strtoupper(__('auth.wsacontext')) }} @endif</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="asan-box-body">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-7">
                            <p class="whited font-gotham-thin wow fadeInLeft">
                                @foreach($headwsaabconts as $headwsaabcont)
                                    {!! $headwsaabcont->content !!}
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./asan main box -->
        <!-- .asan services box -->
        <div class="asan-services-box">
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="main-title font-gotham-black">@if($url =='about') {{ mb_strtoupper(__('auth.wsaabout')) }} @elseif($url == 'context') {{ mb_strtoupper(__('auth.wsacontext2')) }} @endif</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($contentwsaabconts as $contentwsaabcont)
                    <div class="col-sm-4 col-md-4">
                        <div class="asan-services-box-item text-center wow flipInX">
                            <h4 class="font-gotham-bold">{{ $contentwsaabcont->title }}</h4>
                            <p class="font-gotham-book">
                                {!! $contentwsaabcont->content !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ./asan services box -->
    </section> 
    <!-- /SERVICES -->    
</div>
@endsection