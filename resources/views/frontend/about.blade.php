@extends('frontend.layouts.app')
@section('title')
{{ __('auth.homepage') }}
@endsection
@section('main')
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
                        <li class="breadcrump-list-item">{{ __('auth.common') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <section id="about" class="isection">
    <div class="container container-icenter">
        <div class="row">
            @foreach($commoninfolorems as $commoninfolorem)
            <div class="col-md-6">
                <h1 class="main-title font-gotham-black wow fadeInLeft" data-wow-duration="0.4s">
                <span class="blured">{{ $commoninfolorem->translate(config('app.locale'))->title11 }}</span>
                {{ $commoninfolorem->translate(config('app.locale'))->title12 }}
                </h1>
                <div class="main-parag font-gotham-light wow fadeInLeft" data-wow-duration="0.8s">
                    {!! $commoninfolorem->translate(config('app.locale'))->content1 !!}
                </div>
                <h3 class="little-title font-gotham-medium wow fadeInLeft" data-wow-duration="1.2s">
                {{ $commoninfolorem->translate(config('app.locale'))->title2 }}
                </h3>
                <div class="main-parag font-gotham-light wow fadeInLeft" data-wow-duration="1.6s">
                    {!! $commoninfolorem->translate(config('app.locale'))->content2 !!}
                </div>
            </div>
            @endforeach
            <!-- <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-6 col-md-6 wow fadeInDown" data-wow-duration="0.4s">
                        <h4 class="about-list-title font-gotham-medium">Target Audience</h4>
                        <ul class="about-list font-gotham-thin">
                            <li>Top Customer Support</li>
                            <li>Most Liked Company</li>
                            <li>Best In Class 2016</li>
                            <li>Friendliest Group</li>
                            <li>Innovative Brand</li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-6 wow fadeInDown" data-wow-duration="0.8s">
                        <h4 class="about-list-title font-gotham-medium">Notable Awards</h4>
                        <ul class="about-list font-gotham-thin">
                            <li>Top Customer Support</li>
                            <li>Most Liked Company</li>
                            <li>Best In Class 2016</li>
                            <li>Friendliest Group</li>
                            <li>Innovative Brand</li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-6 wow fadeInDown" data-wow-duration="1.2s">
                        <h4 class="about-list-title font-gotham-medium">Our Specialties</h4>
                        <ul class="about-list font-gotham-thin">
                            <li>Top Customer Support</li>
                            <li>Most Liked Company</li>
                            <li>Best In Class 2016</li>
                            <li>Friendliest Group</li>
                            <li>Innovative Brand</li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-6 wow fadeInDown" data-wow-duration="1.6s">
                        <h4 class="about-list-title font-gotham-medium">Featured On</h4>
                        <ul class="about-list font-gotham-thin">
                            <li>Top Customer Support</li>
                            <li>Most Liked Company</li>
                            <li>Best In Class 2016</li>
                            <li>Friendliest Group</li>
                            <li>Innovative Brand</li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="h-box blured-back">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    @foreach($commoninfolorems as $commoninfolorem)
                    <div class="whited font-gotham-light wow fadeInRight">{!! $commoninfolorem->translate(config('app.locale'))->title3 !!}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="m-box">
        <div class="container container-icenter">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="box-image-wrapper wow fadeInLeft">
                        <img src="/storage/common/{{ $infofirst->image }}" alt="icenter">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="m-box-text">
                        <h1 class="main-title whited font-gotham-black wow fadeInUp">
                        <span class="blured">{{ $infofirst->translate(config('app.locale'))->title1 }}</span>
                        {{ $infofirst->translate(config('app.locale'))->title2 }}
                        </h1>
                        <div class="main-parag font-gotham-light wow fadeInRight">
                            {!! $infofirst->translate(config('app.locale'))->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-box-gray">
        <div class="container container-icenter">
            <div class="row">
                @foreach($commoninfolorems as $commoninfolorem)
                <div class="col-md-12">
                    <div class="m-box-text wow fadeInUp">
                        <h1 class="thin-title font-gotham-light">
                        {{ $commoninfolorem->translate(config('app.locale'))->title4 }}
                        </h1>
                        <div class="main-parag font-gotham-light">
                            {!! $commoninfolorem->translate(config('app.locale'))->content4 !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="b-box">
        <div class="container container-icenter">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h1 class="main-title font-gotham-black wow fadeInLeft" data-wow-duration="0.4s">
                    <span class="blured">{{ $infolast->translate(config('app.locale'))->title1 }}</span>
                    {{ $infolast->translate(config('app.locale'))->title2 }}
                    </h1>
                    <div class="main-parag font-gotham-light wow fadeInLeft" data-wow-duration="0.8s">
                        {!! $infolast->translate(config('app.locale'))->content !!}
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="box-image-wrapper wow fadeInRight">
                        <img src="/storage/common/{{ $infolast->image }}" alt="icenter">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- /page-wrapper -->
@endsection