@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title"><b>Xidmətlər</b></div>
        <div class="panel-options pull-right">
            @if(count($headservices)==0)
            <a class="btn btn-default"  href="{{ route('headcreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            @endif
            <!-- <a class="btn btn-default"  href="{{ route('headServices.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('backend.title') }} 1</th>
                <th>{{ __('backend.title') }} 2</th>
                <th>{{ __('backend.content') }}</th>
                <th>{{ __('backend.image') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($headservices as $headservice)
            <tr>
                <td>{!! $headservice->title1 !!}</td>
                <td>{!! $headservice->title2 !!}</td>
                <td>{!! $headservice->content !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/services/{{ $headservice->image }}" width="50" height="50">
                </td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/headServices/' . $headservice->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                    <form class="d-inline" action="{{ route('headServices.destroy', $headservice->head_service_id) }}" method="POST">
                        {{ method_field('DELETE')}} {{ csrf_field() }}
                        <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div><!-- /.table-responsive -->
@if($name != 'asan')
<div class="row">
    <div class="panel-heading">
        <div class="panel-options pull-right">
            <a class="btn btn-default"  href="{{ route('contentcreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('index', $name) }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
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
            @foreach($contentservices as $contentservice)
            <tr>
                <th scope="row">{{ $contentservice->id }}</th>
                <td>{!! $contentservice->title !!}</td>
                <td>{!! $contentservice->content !!}</td>
                <td class="update-col" ><a class="btn btn-xs btn-primary" href="{{ route('contentServices.edit', $contentservice->id) }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('contentServices.destroy', $contentservice->content_service_id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->
@else
<div class="row">
    <div class="panel-heading">
        <div class="panel-options pull-right">
            <a class="btn btn-default"  href="{{ route('easySponsors.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('index', $name) }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('backend.title') }}</th>
                <th>{{ __('backend.image') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($easysponsors as $easysponsor)
            <tr>
                <th scope="row">{{ $easysponsor->id }}</th>
                <td>{!! $easysponsor->title !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/services/{{ $easysponsor->image }}" width="50" height="50">
                </td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/easySponsors/' . $easysponsor->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('easySponsors.destroy', $easysponsor->id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->
@endif
@endsection