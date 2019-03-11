@extends('frontend.layouts.app')
@section('main')
@php $url = basename(Request::url()); @endphp
@section('title')
@if($url =='price') {{ __('auth.pricepro') }} @elseif($url == 'partner') {{ __('auth.wsapartner') }} @elseif($url == 'target') {{ __('auth.wsatarget') }} @endif
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
                        <li class="breadcrump-list-item">
                        @if($url =='price') {{ __('auth.pricepro') }} @elseif($url == 'partner') {{ __('auth.wsapartner') }} @elseif($url == 'target') {{ __('auth.wsatarget') }} @endif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- SERVICES -->
    <section id="wsa">
        <div class="wsa-header-img">
            @foreach($priparttars as $priparttar)
            <img src="/storage/wsa/{{ $priparttar->image }}" alt="icenter wsa">
            @endforeach
        </div>
        <div class="wsa-content">
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="wsa-content-title text-center font-gotham-black">
                        @foreach($priparttars as $priparttar)
                        {{ $priparttar->translate(config('app.locale'))->title }}
                        @endforeach
                        </h1>
                        <p class="wsa-content-body font-gotham-book">
                            @foreach($priparttars as $priparttar)
                            {!! $priparttar->translate(config('app.locale'))->content !!}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /SERVICES -->
</div>
@endsection