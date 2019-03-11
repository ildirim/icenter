@extends('frontend.layouts.app')
@section('main')
@php $url = basename(Request::url()); @endphp
@section('title')
@if($url =='easy_pay') {{ __('auth.pay') }} @elseif($url == 'easy_radio') {{ __('auth.radio') }} @elseif($url == 'easy_visa') {{ __('auth.visa') }} @elseif($url == 'electron') {{ __('auth.electron') }} @endif
@endsection
<!-- page-wrapper -->
<div class="page-wrapper">
    <!-- .top-cover -->
    <div class="top-cover wow fadeInDown"></div>
    <!-- ./top-cover -->    <!-- breadcrump -->
    @php $url = basename(Request::url()); @endphp
    <div class="breadcrump">
        <div class="container container-icenter">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrump-list font-gotham-light">
                        <li class="breadcrump-list-item"><a href="/{{ $find }}">{{ __('auth.homepage') }} </a></li>
                        <li class="breadcrump-list-item">{{ __('auth.product') }} ></li>
                        <li class="breadcrump-list-item">@if($url =='easy_pay') {{ __('auth.pay') }} @elseif($url == 'easy_radio') {{ __('auth.radio') }} @elseif($url == 'easy_visa') {{ __('auth.visa') }} @elseif($url == 'electron') {{ __('auth.electron') }} @endif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- PRODUCTS -->
    <section id="products">
        <!-- .asan main box -->
        <div class="asan-box">
            @foreach($products as $pay)
            <img class="asan-box-pic wow fadeInDown" src="/storage/media/{{ $pay->image }}" alt="icenter">
            @endforeach
            <div class="asan-box-title">
                <div class="container container-icenter">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="main-title font-gotham-black wow fadeInLeft">
                                <span class="blured">@if($url =='easy_pay') {{ __('auth.pay') }} @elseif($url == 'easy_radio') {{ __('auth.radio') }} @elseif($url == 'easy_visa') {{ __('auth.visa') }} @elseif($url == 'electron') {{ __('auth.electron') }} @endif</span> <br>
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
                                @foreach($products as $pay)
                                    {!! $pay->translate(config('app.locale'))->image_content !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./asan main box -->

        <!-- .asan-priviliege -->
        <div class="asan-privilege">
            <div id="particles-js"></div>
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-sm-9 col-md-9">
                        <h1 class="main-title font-gotham-black wow fadeInDown">
                            <span class="blured">“@if($url =='easy_pay') {{ __('auth.pay') }} @elseif($url == 'easy_radio') {{ __('auth.radio') }} @elseif($url == 'easy_visa') {{ __('auth.visa') }} @elseif($url == 'electron') {{ __('auth.electron1') }} @endif”</span>
                            {{ __('auth.preference') }}
                        </h1>
                        <ul class="product-list font-gotham-book">
                            @foreach($preferences as $preference)
                                <li class="wow fadeInUp" data-wow-duration="0.4s">{{ $preference->translate(config('app.locale'))->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-3 col-md-3 hidden-xs">
                        @if($url =='easy_pay')
                        <img src="/img/asan-pay.svg" alt="icenter asan pay" class="wow fadeInDown">
                        @elseif($url == 'easy_radio')
                        <img src="/img/radio.png" alt="icenter asan radio" class="wow fadeInDown">
                        @elseif($url == 'easy_visa')
                        <img src="/img/visa.png" alt="icenter asan visa" class="wow fadeInDown">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- ./asan-priviliege -->

        <!-- .products-info-box -->
        <div class="products-info-box">
            <div class="container container-icenter">
                <div class="row">
                    @foreach($products as $pay)
                    <div class="col-md-12">
                        <h1 class="main-title whited font-gotham-black wow fadeInDown">
                            <span class="blured">{{ $pay->translate(config('app.locale'))->lorem_title1 }}</span> 
                            {{ $pay->translate(config('app.locale'))->lorem_title2 }}

                        </h1>
                        <p class="main-parag whited wow fadeInDown">
                            {!! $pay->translate(config('app.locale'))->lorem_content !!}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ./products-info-box -->

    </section> 
    <!-- /PRODUCTS -->    
</div>
@endsection