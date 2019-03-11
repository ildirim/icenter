@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">Media</div>
        <div class="panel-options pull-right">
            @if(count($mediaproducts)==0)
            <a class="btn btn-default"  href="{{ route('mediaCreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            @endif
            <!-- <a class="btn btn-default"  href="{{ route('mediaProducts.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Şəkilin <br> Məzmunu</th>
                <th>Şəkil</th>
                <th>Lorem <br> Başlıq 1</th>
                <th>Lorem <br> Başlıq 2</th>
                <th>Lorem <br> Məzmun</th>
                <th>Videonun <br> Başlığı 1</th>
                <th>Videonun <br> Başlığı 2</th>
                <th>Videonun <br> Məzmunu</th>
                <th>Video</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mediaproducts as $mediaproduct)
            <tr>
                <td>{!! $mediaproduct->image_content !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/media/{{ $mediaproduct->image }}" width="50" height="50">
                </td>
                <td>{!! $mediaproduct->lorem_title1 !!}</td>
                <td>{!! $mediaproduct->lorem_title2 !!}</td>
                <td>{!! $mediaproduct->lorem_content !!}</td>
                <td>{!! $mediaproduct->video_title1 !!}</td>
                <td>{!! $mediaproduct->video_title2 !!}</td>
                <td>{!! $mediaproduct->video_content !!}</td>
                <td>@if($mediaproduct->video) True @else False @endif</td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/mediaProducts/' . $mediaproduct->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('mediaProducts.destroy', $mediaproduct->media_product_id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->


<div class="row">
    <div class="panel-heading">
        <div class="panel-options pull-right">
            <a class="btn btn-default"  href="{{ route('trainingCreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('trainings.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
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
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $training)
            <tr>
                <th scope="row">{!! $training->id !!}</th>
                <td>{!! $training->title !!}</td>
                <td>{!! $training->content !!}</td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/trainings/' . $training->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('trainings.destroy', $training->id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->

<div class="row">
    <div class="panel-heading">
        <div class="panel-options pull-right">
            <a class="btn btn-default" href="{{ route('preferenceCreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('preferences.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('backend.title') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($preferences as $preference)
            <tr>
                <th scope="row">{{ $preference->id }}</th>
                <td>{!! $preference->title !!}</td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ route('preferences.edit', $preference->id) }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('preferences.destroy', $preference->id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->
@endsection