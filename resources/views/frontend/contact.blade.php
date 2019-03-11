@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.contact') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.contact') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <section id="contact">
        <div class="container container-icenter">
            <div class="row contact-us">
                    <div class="col-md-6">
                        <h1 class="main-title font-gotham-black">
                            <span class="blured wow fadeInLeft" data-wow-duration="0.4s">{{ __('auth.contact') }}</span> <br>
                            <p class="contact-adv wow fadeInLeft" data-wow-duration="0.8s">{{ __('auth.yourmessage') }}</p>
                        </h1>
                        <p class="contact-phone font-gotham-book wow fadeInLeft" data-wow-duration="1s">(+99412) 444-74-33</p>
                        <p class="contact-address font-gotham-book  wow fadeInLeft" data-wow-duration="1.4s">
                            {{ __('auth.address') }}
                            <br> {{ __('auth.bakuaz') }}
                        </p>
                        <ul class="social-links">
                            <li class="social-links-item wow fadeInDown" data-wow-duration="0.4s"><a href="https://twitter.com/"><img src="/img/twitter.svg"></a></li>
                            <li class="social-links-item wow fadeInDown" data-wow-duration="0.8s"><a href="https://www.facebook.com/icenter.az/?fref=ts"><img src="/img/facebook.svg"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <!-- .rectangle-box -->
                        <div class="rectangle-box">
                            <div class="rectangle-box-pic">
                                <div class="rectangle-box-pic-triangle wow fadeInDown" data-wow-duration="1s"></div>
                                <img src="/content/contact.jpg" alt="icenter" class="wow fadeInUp" data-wow-duration="1s">
                            </div>
                        </div>
                        <!-- ./rectangle-box --> 
                    </div>          
            </div>
            <div class="row message-us">
                    <div id="particles-js"></div>
                    <form action="">
                        <div class="col-md-4">
                            <div class="form-group form-group_custom">
                                <label for="name" class="font-gotham-bold">{{ __('auth.name') }}</label>
                                <input type="text" name="name" class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group_custom">
                                <label for="email" class="font-gotham-bold">{{ __('auth.email') }}</label>
                                <input type="email" name="email" class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group_custom">
                                <label for="title" class="font-gotham-bold">{{ __('auth.title') }}</label>
                                <input type="text" name="title" class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group_custom">
                                <label for="message" class="font-gotham-bold">{{ __('auth.message') }}</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control form-control_custom"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group form-group_custom">
                                <button class="btn btn-blue font-gotham-medium wow flipInY">{{ __('auth.send') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </section>
</div>
<!-- /page-wrapper -->
@endsection