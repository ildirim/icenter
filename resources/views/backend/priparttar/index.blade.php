@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <?php $url = basename(request()->path()); ?>
        <div class="panel-title">WSA @if( $url=='price' ) qiymətləndirmə prosesi @elseif( $url=='partner' ) əməkdaşlıq @elseif( $url=='target' ) hədəf @elseif( $url=='global' ) qlobal @else qayda @endif</div>
        <div class="panel-options pull-right">
            @if(count($priparttars)==0)
            <a class="btn btn-default"  href="{{ route('priPartTarCreate', $name) }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>Elave et</b></a>
            @endif
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('backend.title') }}</th>
                <th>{{ __('backend.content') }}</th>
                @if($name != 'rule')
                <th>{{ __('backend.image') }}</th>
                @endif
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($priparttars as $priparttar)
            <tr>
                <td>{!! $priparttar->title !!}</td>
                <td>{!! $priparttar->content !!}</td>
                @if($name != 'rule')
                <td>
                    <img style="margin-bottom:3px" src="/storage/wsa/{{ $priparttar->image }}" width="50" height="50">
                </td>
                @endif
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ route('wsaPriPartTar.edit', $priparttar->id) }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                    <form class="d-inline" action="{{ route('wsaPriPartTar.destroy', $priparttar->pri_part_tar_id) }}" method="POST">
                        {{ method_field('DELETE')}} {{ csrf_field() }}
                        <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div><!-- /.table-responsive -->

@if($name == 'global')
<div class="row">
    <div class="panel-heading">
        <div class="panel-options pull-right">
            <a class="btn btn-default"  href="{{ route('wsaglobal.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>Elave et</b></a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Başlıq</th>
                <th>Şekil</th>
                <th>Redaktə et / Sil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wsaglobals as $wsaglobal)
            <tr>
                <th scope="row">{{ $wsaglobal->id }}</th>
                <td>{!! $wsaglobal->title !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/wsa/{{ $wsaglobal->image }}" width="50" height="50">
                </td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ route('wsaglobal.edit', $wsaglobal->id) }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                    <form class="d-inline" action="{{ route('wsaglobal.destroy', $wsaglobal->wsa_global_id) }}" method="POST">
                        {{ method_field('DELETE')}} {{ csrf_field() }}
                        <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div><!-- /.table-responsive -->
@endif
@endsection