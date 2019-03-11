@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.directory') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.directory') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <section id="staff" class="isection">
        <div class="container container-icenter">
            <!-- lorem burda olacaq -->
            <div class="row">
                <div class="col-md-10">
                    <div class="staff-box">
                        <div class="staff-box-ppic wow fadeInRight">
                            <div class="title-of-staff relative">
                                <img src="/storage/about/{{ $staff->image }}" alt="icenter staff">
                            </div>
                        </div>
                        <div class="staff-box-info wow fadeInLeft">
                            <h2 class="info-box-title font-gotham-black">{{ $staff->translate(config('app.locale'))->name }}</h2>
                            <p class="info-box-position font-gotham-bold">{{ $staff->translate(config('app.locale'))->position }}</p>
                            <div class="info-box-body">
                                 <p class="font-gotham-book">
                                {!! $staff->translate(config('app.locale'))->content !!}
                            </p>
                            <p class="font-gotham-thin">
                                Tel: {{ $staff->phone }}
                            </p>
                            <p class="font-gotham-thin">
                                E-mail: {{ $staff->email }}
                            </p>
                            <ul class="social-links">
                                <li class="social-links-item"><a href="{{ $staff->twitter }}"><img src="/img/twitter-white.svg"></a></li>
                                <li class="social-links-item"><a href="{{ $staff->facebook }}"><img src="/img/facebook-white.svg"></a></li>
                                <li class="social-links-item"><a href="{{ $staff->linkedin }}"><img src="/img/linkedin-white.svg"></a></li>
                            </ul>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection