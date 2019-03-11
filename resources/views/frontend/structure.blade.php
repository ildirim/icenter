@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.structure') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.about') }} ></li>
                        <li class="breadcrump-list-item">{{ __('auth.structure') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <section id="structure" class="isection">
        <div class="container container-icenter">
            <div class="row">
                @foreach($structurelorems as $structurelorem)
                <div class="col-md-12">
                    <h1 class="main-title font-gotham-black wow fadeInDown">
                        <span class="blured">{{ $structurelorem->translate(config('app.locale'))->title1 }}</span>
                        {{ $structurelorem->translate(config('app.locale'))->title2 }}
                    </h1>
                    <div class="main-parag font-gotham-light wow fadeInDown">
                        {!! $structurelorem->translate(config('app.locale'))->content !!}
                    </div>
                </div>
                @endforeach
            </div>
            @foreach($structures->chunk(4) as $structureAll)
            <div class="row">
                @foreach($structureAll as $structure)
                <div class="col-sm-6 col-md-3">
                    <div class="structure-box">
                        <div class="structure-box-pic wow fadeIn">
                            <img src="/storage/about/{{ $structure->image }}">
                        </div>
                        <div class="structure-box-text text-center">
                            <p class="font-gotham-book wow fadeInLeft">
                                {{ $structure->translate(config('app.locale'))->title }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection