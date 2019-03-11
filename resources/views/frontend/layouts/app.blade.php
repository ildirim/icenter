<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if IE 9]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="robots" content="icenter, innovarsiyalar merkezi">
    <meta name="keywords" content="icenter, innovarsiyalar merkezi">
    <meta name="description" content="Innovarsiyalar merkezi">
    <meta name="author" content="">

    @yield('facebook')

    <title> {{ __('auth.icenter') }} - @yield('title') </title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">


    <!-- injector:css -->
    <link rel="stylesheet" href="/css/design.min.css">
    <!-- endinjector -->

    <!-- injector:js -->
    <script src="/js/min/assets/jquery.min.js"></script>
    <script src="/js/min/assets/bootstrap.min.js"></script>
    <script src="/js/min/assets/owl.min.js"></script>
    <script src="/js/min/assets/particles.js"></script>
    <script src="/js/min/assets/wow.min.js"></script>
    <script src="/js/min/app.min.js"></script>
    <!-- endinjector -->
</head>
<body>
<!-- Loader -->
<div class="loader-wrapper">
        <span class="loader">
            <span class="loader-inner"></span>
        </span>
</div>
<!-- ./Loader -->
<header>
    <nav class="navbar-icenter @if(request()->path()!=config('app.locale')) navbar-blue @endif">
        <div class="container container-icenter">
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <div class="icenter-logo">
                        <a href="/">
                            <img src="/img/icenter-logo.png" alt="icenter">
                        </a>
                    </div>
                </div>
                <div class="col-xs-8 col-md-8 text-right">
                    <ul class="navbar-right navbar-main font-gotham-medium">
                        @foreach(config('app.locales') as $key => $value)
                            @if(Request::segment(1)!=$key)
                                <li class="navbar-main-item {{$key}}">
                                    <span class="item-desc">{{ __('auth.lang') }}</span>
                                    <a href="/{{$key}}/{{substr($getUrl, 3)}}"><img src="/img/{{$key}}.svg"></a>
                                    <!-- <a href="#"><img src="/img/english.svg"></a> -->
                                    <!-- <a href="#"><img src="/img/english.svg"></a> -->
                                </li>
                            @endif
                        @endforeach
                        <li class="navbar-main-item">
                            <span class="item-desc">{{ __('auth.search') }}</span>
                            <form action="">
                                <input type="search" class="search">
                            </form>
                        </li>
                        <li class="navbar-main-item">
                            <span class="item-desc">{{ __('auth.menu') }}</span>
                            <a class="sitemap-control">
                                <img class="cancel-menu" src="/img/cancel.svg" style="display:none;">
                                <img class="show-menu" src="/img/menu.svg">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- SITEMAP -->
<div class="sitemap">
    <div class="container container-icenter">
        <div class="row sitemap-center">
            <div class="col-xs-6 col-md-6">
                <div class="sitemap-contact font-gotham-thin">
                    <p class="sitemap-contact-phone">(+99412) 444-74-33</p>
                    <p class="sitemap-contact-address">
                        {{ __('auth.address') }}
                        <br> {{ __('auth.bakuaz') }}
                    </p>
                    <ul class="social-links">
                        <li class="social-links-item"><a href="https://twitter.com/"><img src="/img/twitter.svg"></a>
                        </li>
                        <li class="social-links-item"><a href="https://www.facebook.com/icenter.az/?fref=ts"><img
                                        src="/img/facebook.svg"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-md-6">
                <ul class="sitemap-menu pull-right font-gotham-thin">
                    <li class="sitemap-menu-item"><a href="/{{ $find }}">{{ __('auth.homepage') }}</a></li>
                    <li class="sitemap-menu-item"><a href="#">{{ __('auth.about') }}</a>
                        <ul class="sitemap-dropdown" style="display:none">
                            <li class="sitemap-dropdown-item"><a href="{{ route('about') }}">{{ __('auth.common') }}</a>
                            </li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('staffs') }}">{{ __('auth.directory') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('structure') }}">{{ __('auth.structure') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('partner') }}">{{ __('auth.partner') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('contact') }}">{{ __('auth.contact') }}</a></li>
                        </ul>
                    </li>
                    <li class="sitemap-menu-item"><a href="#">{{ __('auth.service') }}</a>
                        <ul class="sitemap-dropdown" style="display:none">
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('easy') }}">{{ __('auth.easycommunal') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('training') }}">{{ __('auth.traincourse') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('seyyar') }}">{{ __('auth.seyyarax') }}</a></li>
                            <li class="sitemap-dropdown-item"><a href="{{ route('it') }}">{{ __('auth.itx') }}</a></li>
                        </ul>
                    </li>
                    <li class="sitemap-menu-item"><a href="#">{{ __('auth.product') }}</a>
                        <ul class="sitemap-dropdown" style="display:none">
                            <li class="sitemap-dropdown-item"><a href="{{ route('easy_pay') }}">{{ __('auth.pay') }}</a>
                            </li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('easy_radio') }}">{{ __('auth.radio') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('easy_visa') }}">{{ __('auth.visa') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('electron') }}">{{ __('auth.electron') }}</a></li>
                        </ul>
                    </li>
                    <li class="sitemap-menu-item"><a href="{{ route('new') }}">{{ __('auth.news') }}</a></li>
                    <li class="sitemap-menu-item"><a href="{{ route('contact') }}">{{ __('auth.contact') }}</a></li>
                    <li class="sitemap-menu-item"><a href="#">WSA</a>
                        <ul class="sitemap-dropdown" style="display:none">
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('wsa_about') }}">{{ __('auth.wsaabout') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('wsa_context') }}">{{ __('auth.wsacontext') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('wsa_price') }}">{{ __('auth.pricepro') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('wsa_partner') }}">{{ __('auth.wsapartner') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('our_partner') }}">{{ __('auth.ourpartner') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('wsa_target') }}">{{ __('auth.wsatarget') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('gallery') }}">{{ __('auth.gallery') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('global') }}">{{ __('auth.wsaglobal') }}</a></li>
                            <li class="sitemap-dropdown-item"><a
                                        href="{{ route('rules') }}">{{ __('auth.wsarules') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sitemap-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-md-6">
                    <div class="sitemap-footer-left">
                        <p class="font-gotham-light">Created by <a class="font-gotham-bold"
                                                                   href="https://safaroff.com/">SAFAROFF</a></p>
                    </div>
                </div>
                <div class="col-xs-7 col-md-6">
                    <div class="sitemap-footer-right pull-right">
                        <p class="font-gotham-light">{{ __('auth.allsecurity') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SITEMAP -->
@yield('main')
@if(basename(request()->path()) == config('app.locale'))
    <!-- FOOTER MAIN-->
    <footer id="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-md-6">
                    <div class="footer-left">
                        <p class="font-gotham-light">created by <a class="font-gotham-bold"
                                                                   href="https://safaroff.com/">SAFAROFF</a></p>
                    </div>
                </div>
                <div class="col-xs-7 col-md-6">
                    <div class="footer-right pull-right">
                        <p class="font-gotham-light">{{ __('auth.allsecurity') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER MAIN-->
@else
    <footer id="footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <ul class="social-links">
                        <li class="social-links-item wow fadeInUp" data-wow-duration="0.8s"><a
                                    href="https://twitter.com/"><img src="/img/twitter.svg"></a></li>
                        <li class="social-links-item wow fadeInUp" data-wow-duration="1.2s"><a
                                    href="https://www.facebook.com/icenter.az/?fref=ts"><img
                                        src="/img/facebook.svg"></a></li>
                    </ul>
                    <p class="font-gotham-thin">
                        {{ __('auth.allsecurity') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
@endif
@yield('addnews')
</body>
</html>