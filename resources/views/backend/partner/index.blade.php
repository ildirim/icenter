@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">Partnyor</div>
        <div class="panel-options pull-right">
            <a class="btn btn-default" href="{{ route('partners.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('partners.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
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
            @foreach($partners as $partner)
            <tr>
                <th scope="row">{{ $partner->id }}</th>
                <td>{!! $partner->title !!}</td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/about/{{ $partner->image }}" width="50" height="50">
                </td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/partners/' . $partner->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('partners.destroy', $partner->id) }}" method="POST">
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
            <a class="btn btn-default" href="{{ route('partnerlorem.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
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
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/partnerlorem/' . $lorem->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('partnerlorem.destroy', $lorem->id) }}" method="POST">
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