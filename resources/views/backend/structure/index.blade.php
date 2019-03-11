@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">Struktur</div>
        <div class="panel-options pull-right">
            <a class="btn btn-default" href="{{ route('structures.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('structures.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
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
            @foreach($structures as $structure)
            <tr>
                <th scope="row">{{ $structure->id }}</th>
                <td>{!! $structure->title !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/about/{{ $structure->image }}" width="50" height="50">
                </td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/structures/' . $structure->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('structures.destroy', $structure->id) }}" method="POST">
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
            @if(count($lorems)==0)
            <a class="btn btn-default" href="{{ route('structurelorem.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            @endif
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
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lorems as $lorem)
            <tr>
                <td>{!! $lorem->title1 !!}</td>
                <td>{!! $lorem->title2 !!}</td>
                <td>{!! $lorem->content !!}</td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/structurelorem/' . $lorem->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('structurelorem.destroy', $lorem->id) }}" method="POST">
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