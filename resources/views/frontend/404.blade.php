@extends('frontend.layouts.app')
@section('title')
404
@endsection
@section('main')
<!-- page-wrapper -->
<div class="page-wrapper">
    <!-- .top-cover -->
    <div class="top-cover wow fadeInDown"></div>
    <!-- ./top-cover -->    <!-- 404 -->
    <section id="notfound">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="notfound font-gotham-medium">
                        <img src="/img/404.png">
                        <p>This page in unknown or does not exist.</p>
                        <span>Sorry about that, but the page you looking for isn’t available.</span>
                        <a href="{{ url()->previous() }}" class="btn btn-blue">Go to Previous Page</a>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- /404 -->    
</div>
@endsection