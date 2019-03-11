@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">Xəbərlər</div>
        <div class="panel-options">
            <a class="btn btn-default"  href="{{ route('news.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('news.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('backend.title') }}</th>
                <th>{{ __('backend.content') }}</th>
                <th>{{ __('backend.image') }}</th>
                <th>Yeni {{ __('backend.image') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $new)
            <tr>
                <th scope="row">{{ $new->id }}</th>
                <td>{!! $new->title !!}</td>
                <td>{!! $new->content !!}</td>
                <td>
                    @foreach($images as $image)
                    @if($image->news_id == $new->id)
                    <img style="margin-bottom:3px" src="/storage/news/{{ $image->image }}" width="50" height="50">
                    @endif
                    @endforeach
                </td>
                <td><a href="{{ route('newsImage.edit', $new->news_id) }} "><input type="button" class="btn btn-xs btn-default" name="ex_pic" value="Yeni şəkil"></a></td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/news/' . $new->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('news.destroy', $new->news_id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align: center;">
{{$news->links()}}
</div>
</div><!-- /.table-responsive -->
@endsection