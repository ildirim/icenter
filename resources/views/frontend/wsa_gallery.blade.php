@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.gallery') }}
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
                        <li class="breadcrump-list-item">{{ __('auth.gallery') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./breadcrump -->    <!-- GALLERY -->
    <section id="gallery">
        <div class="gallery">
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="main-title wow fadeInDown">
                        <span class="blured">
                            {{ mb_strtoupper(__('auth.gallery')) }}
                        </span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    @foreach($galleries as $gallery)
                    <div class="col-sm-6 col-md-4">
                        <div class="gallery-item wow flipInX">
                            <img src="/storage/wsa/{{ $gallery->image }}" alt="icenter gallery">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    
                    <div class="col-md-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination_custom">
                                <!-- <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li> -->
                                {{ $galleries->links() }}
                            </ul>
                        </nav>                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /GALLERY -->
    </div>
    @endsection