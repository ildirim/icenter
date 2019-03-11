@extends('backend.layouts.app')
@section('main')
<div class="row">
    <div class="panel-heading">
        <div class="panel-title">Slayder</div>
        <div class="panel-options pull-right">
            <a class="btn btn-default" href="{{ route('homeslider.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('backend.title') }}</th>
                <th>{{ __('backend.content') }}</th>
                <th>Link</th>
                <th>Sıra</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($homesliders as $homeslider)
            <tr>
                <td>{!! $homeslider->title !!}</td>
                <td>{!! $homeslider->content !!}</td>
                <td>{!! $homeslider->link !!}</td>
                <td>{{ $homeslider->place }}</td>
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/homeslider/' . $homeslider->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('homeslider.destroy', $homeslider->id) }}" method="POST">
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