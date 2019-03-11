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
    <!-- ./breadcrump -->
    <section id="staff" class="isection">
        <div class="container container-icenter">
            
            <div class="row">
                @foreach($staffs as $staff)
                <div class="col-md-12 staff-col">
                    <div class="staff-box">
                        <div class="staff-box-info wow fadeInUp">
                            <h2 class="info-box-title font-gotham-black">{{ $staff->translate(config('app.locale'))->name }}</h2>
                            <p class="info-box-position font-gotham-bold">{{ $staff->translate(config('app.locale'))->position }}</p>
                            <div class="info-box-body">
                                <div class=" font-gotham-book">
                                    {!! $staff->translate(config('app.locale'))->content !!}
                                </div>
                            </div>
                            <a href="{{ route('staff_single', $staff->id) }}" class="btn btn-blue btn-white font-gotham-bold">{{ __('auth.all') }}</a>
                        </div>
                        @php
                        $words = explode(" ", $staff->translate(config('app.locale'))->name);
                        $firsttitle = "";
                        foreach ($words as $w) {
                        $firsttitle .= $w[0];
                        }
                        @endphp
                        <div class="staff-box-ppic wow fadeInDown">
                            <div class="title-of-staff relative" data-title="{{ $firsttitle }}">
                                <img src="/storage/about/{{ $staff->image }}" alt="icenter staff">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </section>
</div>
@endsection