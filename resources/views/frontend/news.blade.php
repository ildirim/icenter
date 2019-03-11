@extends('frontend.layouts.app')
@section('main')
@section('title')
{{ __('auth.news') }}
@endsection
<!-- page-wrapper -->
<div class="page-wrapper np">
    <section class="news-header" style="background-image:url(/content/news1.png);">
        <div class="container container-icenter">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="news-header-title font-gotham-black wow fadeInRight" data-wow-duration="0.4s">
                    {{ __('auth.news') }}
                    </h2>
                    <p class="news-header-desc font-gotham-thin wow fadeInLeft" data-wow-duration="0.8s">
                        {{ __('auth.lastnews') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- NEWS -->
    <section id="news">
        <div class="container container-icenter">
            <div class="row" id="a">
                <!-- .news-box-item -->
                @foreach($news->chunk(3) as $newAll)
                <div class="row">
                        @foreach($newAll as $new)
                    <div class="col-md-4">
                        <a href="{{ route('news_single', ['id' => $new->id]) }}">
                            <div class="news-box font-gotham-medium wow fadeIn">
                                <div class="news-box-img">
                                    <img src="/storage/news/{{ $new->images->first()->image }}" alt="icenter news">
                                </div>
                                <div class="news-box-body">
                                    <span class="news-box-body-date">{{ $new->created_at->day }} {{ $new->created_at->format('F') }}, {{ $new->created_at->format('Y') }}</span>
                                    <h4 class="news-box-body-title">
                                    {{ substr($new->translate(config('app.locale'))->title, 0, 90) }}
                                    </h4>
                                    <div class="news-box-body-text">
                                        {!! substr($new->translate(config('app.locale'))->content, 0, 45) .'...' !!}
                                    </div>
                                    <!-- <span class="news-box-body-comments">
                                        123 / Şərhlər
                                    </span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    </div>
                @endforeach
                <!-- ./news-box-item -->
                
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button  id="btnblue" class="btn btn-blue font-gotham-medium wow flipInY">{{ __('auth.more') }}</button>
                </div>
            </div>
        </div>
    </section>
    <!-- /NEWS -->
</div>
@section('addnews')
<script type="text/javascript">
    $(document).ready(function(){
        var i = 0;
        $href = (window.location.pathname).substring(0, 3);
        $('#btnblue').click(function(){
            $count = {{ count($news) }};
            i++;
            var result = '';
            $.ajax({
                type: "get",
                dataType: "json",
                data: { count: $count, i:  i} ,
                url: "{{ route('ajaxnews') }}",
                success: function (response) {
                    if (response.length == 0) {
                        $('#btnblue').hide();
                    }
                    response.map(function(item, index){
                        lasst = "<div class='col-md-4'><a href='/{{$find}}news_single/"+item.id+"'><div class='news-box font-gotham-medium wow fadeIn'><div class='news-box-img'><img src='/storage/news/"+item.image+"' alt='icenter news'></div><div class='news-box-body'><span class='news-box-body-date'>"+ item.day +" "+ item.month +", "+ item.year +"</span><h4 class='news-box-body-title'>"+ item.title +"</h4><div class='news-box-body-text'>"+ item.content.substring(0, 45) +"...</div></div></div></a></div>";
                        result = result + lasst;
                        
                    })
                    $('#a').append("<div class='row'>" + result + "</div>");

                }
            });
        });
    });
</script>
@endsection
@endsection