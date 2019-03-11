@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.wsaglobal') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.wsaglobal') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- SERVICES -->
    <section id="wsa">
        <div class="wsa-header-img">
            @foreach($headglobals as $global)
            <img src="/storage/wsa/{{ $global->image }}" alt="icenter wsa">
            @endforeach
        </div>
        <div class="wsa-content">
            <div class="container container-icenter">
                <div class="row">
                    @foreach($headglobals as $global)
                    <div class="col-md-12">
                        <h1 class="wsa-content-title text-center font-gotham-black">
                                {{ $global->translate(config('app.locale'))->title }}
                        </h1>
                        <p class="wsa-content-body font-gotham-book">
                            {!! $global->translate(config('app.locale'))->content !!}
                        </p>
                    </div>
                    @endforeach
                </div>
                <div class="row corporates">
                    @foreach($contentglobals as $global)
                    <div class="col-sm-6 col-md-3">
                        <div class="wsa-corporate-box text-center wow zoomIn">
                            <div class="wsa-corporate-box-img" style="background-image:url(/storage/wsa/{{ $global->image }});"></div>
                            <p class="wsa-corporate-box-desc font-gotham-medium">
                                {{ $global->translate(config('app.locale'))->title }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> 
    <!-- /SERVICES -->    
</div>
@endsection