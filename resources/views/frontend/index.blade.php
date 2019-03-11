@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.homepage') }}
@endsection
<div class="icenter-video">
	<video autoplay muted loop src="/video/icenter.mp4"></video>
	<!-- <img src="img/video-cover.png"/> -->
</div>

<!-- MAIN-SECTION -->
<section id="main-section">
	<div class="container">
		<div class="row">
			<div class="jumbotron jumbotron_custom text-center">
				<div class="owl-carousel owl-theme main-carousel">
					@foreach($homesliders as $homeslider)
					<div class="main-carousel-item">
						<h1 class="font-gotham-bold wow flipInX">{{ $homeslider->translate(config('app.locale'))->title }}</h1>
						<p class="font-gotham-thin wow zoomIn">
							{!! $homeslider->translate(config('app.locale'))->content !!}
						</p>
						<p>
							<a class="btn btn-main font-gotham-bold" href="{{ $homeslider->link }}" role="button" data-text="{{ __('auth.more2') }}">{{ __('auth.more2') }}</a>
						</p>
					</div>
					@endforeach
				</div>
				<hr class="main-line hidden-xs">
				<!-- .mainlink-box -->
				<div class="mainlink-box hidden-xs">
					<!-- .mainlink-box-item -->
					<div class="col-sm-3 col-md-3 np wow fadeInUp" data-wow-duration="0.4s">
						<a href="{{ route('new') }}">
							<div class="mainlink-box-item text-center font-gotham-thin">
								<span>1</span>
								<p>{{ mb_strtoupper(__('auth.news')) }}</p>
							</div>
						</a>
					</div>
					<!-- ./mainlink-box-item -->
					<!-- .mainlink-box-item -->
					<div class="col-sm-3 col-md-3 np wow fadeInUp" data-wow-duration="0.6s">
						<a href="http://tercume.asan.az/">
							<div class="mainlink-box-item text-center font-gotham-thin">
								<span>2</span>
								<p>{{ mb_strtoupper(__('auth.translation')) }}</p>
							</div>
						</a>
					</div>
					<!-- ./mainlink-box-item -->
					<!-- .mainlink-box-item -->
					<div class="col-sm-3 col-md-3 np wow fadeInUp" data-wow-duration="0.8s">
						<a href="http://asanradio.az/">
							<div class="mainlink-box-item text-center font-gotham-thin">
								<span>3</span>
								<p>{{ mb_strtoupper(__('auth.radio')) }}</p>
							</div>
						</a>
					</div>
					<!-- ./mainlink-box-item -->
					<!-- .mainlink-box-item -->
					<div class="col-sm-3 col-md-3 np wow fadeInUp" data-wow-duration="1s">
						<a href="http://www.ideya.az/">
							<div class="mainlink-box-item text-center font-gotham-thin">
								<span>4</span>
								<p>{{ mb_strtoupper(__('auth.idea')) }}</p>
							</div>
						</a>
					</div>
					<!-- ./mainlink-box-item -->
				</div>
				<!-- /.mainlink-box -->
			</div>
		</div>
	</div>
</section>

@endsection