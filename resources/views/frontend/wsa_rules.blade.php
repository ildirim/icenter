@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.wsarules') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.wsarules') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- SERVICES -->
    <section id="wsa">
        <div class="wsa-content">
            <div class="container container-icenter">
                <div class="row">
                    @foreach($rules as $rule)
                    <div class="col-md-12">
                        <h1 class="wsa-content-title font-gotham-black">
                            {{ $rule->translate(config('app.locale'))->title }}
                        </h1>
                        <p class="wsa-content-body font-gotham-book">
                            {!! $rule->translate(config('app.locale'))->content !!}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> 
    <!-- /SERVICES -->    
</div>
@endsection