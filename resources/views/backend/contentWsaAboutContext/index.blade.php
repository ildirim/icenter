@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">WSA @if(basename(request()->path())=='about') haqqında @else kontekst @endif</div>
        <div class="panel-options pull-right">
            @if(count($headwsas)==0)
            <a class="btn btn-default"  href="{{ route('headAboutContextCreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            @endif
            <!-- <a class="btn btn-default"  href="{{ route('contentAboutContextIndex', $name) }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('backend.content') }}</th>
                <th>{{ __('backend.image') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($headwsas as $headwsa)
            <tr>
                <td>{!! $headwsa->content !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/wsa/{{ $headwsa->image }}" width="50" height="50">
                </td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ route('headWsaAboutContext.edit', $headwsa->id) }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                    <form class="d-inline" action="{{ route('headWsaAboutContext.destroy', $headwsa->head_wsa_ab_con_id) }}" method="POST">
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
            <a class="btn btn-default"  href="{{ route('contentAboutContextCreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
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
            @foreach($contentwsas as $contentwsa)
            <tr>
                <th scope="row">{{ $contentwsa->id }}</th>
                <td>{!! $contentwsa->title !!}</td>
                <td>{!! $contentwsa->content !!}</td>
                <td class="update-col" ><a class="btn btn-xs btn-primary" href="{{ route('wsaAboutContext.edit', $contentwsa->id) }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('wsaAboutContext.destroy', $contentwsa->cont_wsa_ab_con_id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->
@endsection