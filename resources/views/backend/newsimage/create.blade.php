@extends('backend.layouts.app')
@section('main')
<div class="row">
	@if(Session::has('message' ))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="panel-heading">
		<div class="panel-title">Yeni şəkil</div>
		<div class="panel-options">
			<a class="btn btn-default" onclick="goBack()" data-rel="collapse"><i class="fa fa-reply"></i> <b>Geri</b></a>
			<!-- <a class="btn btn-default"  href="{{ route('news.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
		</div>
	</div>
</div>
<div class="panel-body">
	@include('backend.errors.validation')
	<div id="rootwizard">
		<form class="form-horizontal" action="{{ route('newsImage.update', Request::segment(3)) }}" method="post" enctype="multipart/form-data">
			{{ method_field('PUT')}}
			{{ csrf_field() }}
			<div class="tab-pane">
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ __('backend.image') }}</label>
					<div class="col-sm-9">
						<input type="file" name="images[]" multiple="multiple"  class="btn btn-default">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-10">
						<button type="submit" class="btn btn-info">{{ __('backend.create') }}</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
@endsection