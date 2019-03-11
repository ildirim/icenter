@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">Ümumi məlumat</div>
        <div class="panel-options pull-right">
            @if(count($commoninfos) < 2)
            <a class="btn btn-default" href="{{ route('commoninfo.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            @endif
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('backend.title') }} 1</th>
                <th>{{ __('backend.title') }} 2</th>
                <th>{{ __('backend.content') }}</th>
                <th>{{ __('backend.image') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commoninfos as $commoninfo)
            <tr>
                <th scope="row">{{ $commoninfo->id }}</th>
                <td>{!! $commoninfo->title1 !!}</td>
                <td>{!! $commoninfo->title2 !!}</td>
                <td>{!! $commoninfo->content !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/common/{{ $commoninfo->image }}" width="50" height="50">
                </td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/commoninfo/' . $commoninfo->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('commoninfo.destroy', $commoninfo->id) }}" method="POST">
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
            @if(count($lorems) == 0)
            <a class="btn btn-default" href="{{ route('commoninfolorem.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            @endif
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('backend.title') }} 1 (1)</th>
                <th>{{ __('backend.title') }} 1 (2)</th>
                <th>{{ __('backend.content') }} 1</th>
                <th>{{ __('backend.title') }} 2</th>
                <th>{{ __('backend.content') }} 2</th>
                <th>{{ __('backend.title') }} 3</th>
                <th>{{ __('backend.title') }} 4</th>
                <th>{{ __('backend.content') }} 4</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lorems as $lorem)
            <tr>
                <td>{!! $lorem->title11 !!}</td>
                <td>{!! $lorem->title12 !!}</td>
                <td>{!! $lorem->content1 !!}</td>
                <td>{!! $lorem->title2 !!}</td>
                <td>{!! $lorem->content2 !!}</td>
                <td>{!! $lorem->title3 !!}</td>
                <td>{!! $lorem->title4 !!}</td>
                <td>{!! $lorem->content4 !!}</td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/commoninfolorem/' . $lorem->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('commoninfolorem.destroy', $lorem->id) }}" method="POST">
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