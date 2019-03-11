@extends('backend.layouts.app')
@section('main')
<div class="row">
    @if(Session::has('message' ))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-heading">
        <div class="panel-title">Rəhbərlik</div>
        <div class="panel-options">
            <a class="btn btn-default"  href="{{ route('directories.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
            <!-- <a class="btn btn-default"  href="{{ route('directories.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('backend.name') }}</th>
                <th>{{ __('backend.position') }}</th>
                <th>{{ __('backend.content') }}</th>
                <th>Melumatlar</th>
                <th>{{ __('backend.image') }}</th>
                <th>{{ __('backend.updatedel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($directories as $directory)
            <tr>
                <th scope="row">{{ $directory->id }}</th>
                <td>{!! $directory->name !!}</td>
                <td>{!! $directory->position !!}</td>
                <td>{!! $directory->content !!}</td>
                <td>
                    <table class="table" style="margin-bottom: 0">
                        <tr>
                            <th style="padding-top: 0!important">Mobil :</th>
                            <td style="padding-top: 0!important">{!! $directory->phone !!}</td>
                        </tr>
                        <tr>
                            <th style="padding-top: 0!important">Email :</th>
                            <td style="padding-top: 0!important">{!! $directory->email !!}</td>
                        </tr>
                        <tr>
                            <th style="padding-top: 0!important">Twitter :</th>
                            <td style="padding-top: 0!important">{!! $directory->twitter !!}</td>
                        </tr>
                        <tr>
                            <th style="padding-top: 0!important">Facebook :</th>
                            <td style="padding-top: 0!important">{!! $directory->facebook !!}</td>
                        </tr>
                        <tr>
                            <th style="padding-top: 0!important">Linkedin :</th>
                            <td style="padding-top: 0!important">{!! $directory->linkedin !!}</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <img style="margin-bottom:3px" src="/storage/about/{{ $directory->image }}" width="50" height="50">
                </td>
                <td class="update-col" ><a  class="btn btn-xs btn-primary" href="{{ url('admin/directories/' . $directory->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('directories.destroy', $directory->id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div><!-- /.table-responsive -->
<!-- <div class="row">
    <div class="panel-heading">
        <div class="panel-options pull-right">
            @if(count($lorems) < 2)
            <a class="btn btn-default" href="{{ route('directorylorem.create') }}" data-rel="collapse"><i class="fa fa-plus"></i> <b>{{ __('backend.create') }}</b></a>
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
                <td class="update-col"><a class="btn btn-xs btn-primary" href="{{ url('admin/directorylorem/' . $lorem->id . '/edit') }}"><i class="fa fa-refresh"></i> {{ __('backend.update') }}</a>
                <form class="d-inline" action="{{ route('directorylorem.destroy', $lorem->id) }}" method="POST">
                    {{ method_field('DELETE')}} {{ csrf_field() }}
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> {{ __('backend.delete') }}</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> -->
<!-- /.table-responsive -->
@endsection