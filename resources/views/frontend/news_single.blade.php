@extends('frontend.layouts.app')
@section('facebook')
<meta property="og:url" content="http://icenter.saffman.co.uk/az/news_single/{{ $news->id }}" >
<meta property="og:title" content="{{ $news->translate(config('app.locale'))->title }}">
<meta property="og:description" content="{{ $news->translate(config('app.locale'))->content }}">
<meta property="og:image" content="http://icenter.saffman.co.uk/storage/news/{{ $news->images->first()->image }}">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@nytimes">
<meta name="twitter:creator" content="@SarahMaslinNir">
<meta name="twitter:title" content="{{ $news->translate(config('app.locale'))->title }}">
<meta name="twitter:description" content="{{ $news->translate(config('app.locale'))->content }}">
<meta name="twitter:image" content="http://icenter.saffman.co.uk/storage/news/{{ $news->images->first()->image }}">
@endsection
@section('main')
@section('title')
{{ __('auth.news') }}
@endsection
<!-- page-wrapper -->
<div class="page-wrapper np">
    <div class="owl-carousel news-single-carousel">
        @foreach($news->images as $image)
        <div class="news-single-carousel-item">
            <img src="/storage/news/{{ $image->image }}" alt="">
        </div>
        @endforeach
    </div>
    <!-- NEWS -->
    <section id="news">
        <div class="news-post">
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-md-11">
                        <h2 class="news-post-title font-gotham-black"> {{ substr($news->translate(config('app.locale'))->title, 0, 90) }}</h2>
                        <div class="news-post-text font-gotham-medium">
                            {!! $news->translate(config('app.locale'))->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="owl-carousel news-last-carousel">
            <a href="#">
                <div class="news-last-carousel-item">
                    <img src="content/news6.png" alt="icenter news">
                    <div class="news-last-desc font-gotham-medium wow fadeInUp">
                        <p>
                            Dünyanın İlk Kompüter Proqramçısı, Texnologiya <br> tarixini dəyişdirən qadın: Ada Lovelace
                        </p>
                        <span>
                            10 Noyabr, 2017
                        </span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="news-last-carousel-item">
                    <img src="content/news7.png" alt="icenter news">
                    <div class="news-last-desc font-gotham-medium wow fadeInUp">
                        <p>
                            Dünyanın İlk Kompüter Proqramçısı, Texnologiya <br> tarixini dəyişdirən qadın: Ada Lovelace
                        </p>
                        <span>
                            10 Noyabr, 2017
                        </span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="news-last-carousel-item">
                    <img src="content/news5.png" alt="icenter-news">
                    <div class="news-last-desc font-gotham-medium wow fadeInUp">
                        <p>
                            Dünyanın İlk Kompüter Proqramçısı, Texnologiya <br> tarixini dəyişdirən qadın: Ada Lovelace
                        </p>
                        <span>
                            10 Noyabr, 2017
                        </span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="news-last-carousel-item">
                    <img src="content/news6.png" alt="icenter news">
                    <div class="news-last-desc font-gotham-medium wow fadeInUp">
                        <p>
                            Dünyanın İlk Kompüter Proqramçısı, Texnologiya <br> tarixini dəyişdirən qadın: Ada Lovelace
                        </p>
                        <span>
                            10 Noyabr, 2017
                        </span>
                    </div>
                </div>
            </a>
        </div> -->
        <div class="news-box-wrap">
            <div class="container container-icenter">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="new-news">{{ __('auth.newnews') }}</h3>
                    </div>
                    @foreach($lastnews as $lastnew)
                    <!-- .news-box-item -->
                    <div class="col-md-4">
                        <a href="{{ route('news_single', ['id' => $lastnew->id]) }}">
                            <div class="news-box font-gotham-medium wow zoomIn">
                                <div class="news-box-img">
                                    <img src="/storage/news/{{ $lastnew->images->first()->image }}" alt="icenter {{ $lastnew->translate(config('app.locale'))->title }}">
                                </div>
                                <div class="news-box-body">
                                    <span class="news-box-body-date">{{ $lastnew->created_at->day }} {{ $lastnew->created_at->format('F') }}, {{ $lastnew->created_at->format('Y') }}</span>
                                    <h4 class="news-box-body-title">
                                    {{ $lastnew->translate(config('app.locale'))->title }}
                                    </h4>
                                    <div class="news-box-body-text">
                                        {!! substr($lastnew->translate(config('app.locale'))->content, 0, 45) . '...' !!}
                                    </div>
                                    <!-- <span class="news-box-body-comments">
                                        123 / Şərhlər
                                    </span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- ./news-box-item -->
                   @endforeach
                </div>
            </div>
        </div>
       <!--  <div  class="comments-box">
            <div class="container">
                <div class="row">
                    <form action="route('message')" method="post">
                        <div class="col-md-12">
                            <div class="form-group form-group_custom font-gotham-medium">
                                <label for="comment">Şərh<span>*</span></label>
                                <input type="text" name="comment" class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-comment form-group_custom font-gotham-medium">
                                <label for="comment">Ad<span>*</span></label>
                                <input type="text" class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-comment form-group_custom font-gotham-medium">
                                <label for="comment">E-poçt ünvanı<span>*</span></label>
                                <input type="email" class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-comment form-group_custom font-gotham-medium">
                                <label for="comment">Vebsayt</label>
                                <input type="text"class="form-control form-control_custom">
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group form-group_custom font-gotham-medium">
                                <button class="btn btn-blue wow flipInY">GÖNDƏR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </section>
    <!-- /NEWS -->
    <div class="share-box">
        <ul class="share-items">
            <!-- <li><a class="bg bg-google-plus" href="#"><img src="/img/google-plus-white.svg"></a></li> -->
            <li><a target="_blank" href="https://facebook.com/sharer/sharer.php?u=http://icenter.saffman.co.uk/az/news_single/{{ $news->id }}" class="bg bg-facebook jssocials-share-label"><img src="/img/facebook-white.svg"></a></li>
            <li>

            <a target="_blank" href="http://www.twitter.com/intent/tweet?url=http://icenter.saffman.co.uk/az/news_single/{{ $news->id }}" class="bg bg-twitter " data-via="Icenter" data-hashtags="Icenter" data-show-count="false"><img src="/img/twitter-white.svg"></a></li><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </ul>
        <a class="bg toggle bg-share"><img src="/img/share.svg"></a>
    </div>
</div>
@endsection