@extends('frontend.layouts.app')
@section('main')
@php $url = basename(Request::url()); @endphp
@section('title')
{{ __('auth.ourpartner') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.ourpartner') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- WSA -->
    <section id="wsa">
        <div class="targets">
            <img src="/content/target.png" alt="icenter targets">
        </div>
    </section> 
    <!-- /WSA -->    
</div>
@endsection