@extends('backend.layouts.app')
@section('main')
<div class="row">
	@if(Session::has('message' ))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="panel-heading">
		<div class="panel-title">Qalereya</div>
		<div class="panel-options">
			<a class="btn btn-default" onclick="goBack()" data-rel="collapse"><i class="fa fa-reply"></i> <b>Geri</b></a>
			<!-- <a class="btn btn-default"  href="{{ route('gallery.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
		</div>
	</div>
</div>
<div class="panel-body">
	@include('backend.errors.validation')
	<form class="form-horizontal" action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
		{{ method_field('PUT')}}
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-md-2 control-label">{{ __('backend.image') }}</label>
			<div class="col-sm-9">
				<input type="file" name="image" class="btn btn-default">
				@if($gallery->image)
				<a style="font-size: 16px" target="_blank" href="/storage/wsa/{{ $gallery->image }}">{{ __('backend.show') }}</a>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-10">
				<button type="submit" class="btn btn-info">{{ __('backend.change') }}</button>
			</div>
		</div>
	</form>
</div>
@endsection