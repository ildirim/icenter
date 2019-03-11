@extends('backend.layouts.app')
@section('main')
<div class="row">
	@if(Session::has('message' ))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="panel-heading">
		<div class="panel-title">Partnyor</div>
		<div class="panel-options">
			<a class="btn btn-default" onclick="goBack()" data-rel="collapse"><i class="fa fa-reply"></i> <b>Geri</b></a>
			<!-- <a class="btn btn-default"  href="{{ route('news.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
		</div>
	</div>
</div>
<div class="panel-body">
	@include('backend.errors.validation')
	<div id="rootwizard">
		<div class="but_list">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					@foreach(config('app.locales') as $key => $locale)
					
					<li role="presentation" class="@if($loop->iteration == 1) active  @endif"><a href="#home{{ $loop->iteration }}" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">{{ $locale}}</a></li>
					@endforeach
					
				</ul>
				<div id="myTabContent" class="tab-content">
					<form class="form-horizontal" action="{{ route('commoninfo.store') }}" method="post" enctype="multipart/form-data">
						<div class="tab-content">
							@csrf
							@foreach(config('app.locales') as $key => $locale)
							<div class="tab-pane fade in @if($loop->iteration == 1) active @else  @endif" id="home{{$loop->iteration}}">
								<div class="form-group">
									<label class="col-sm-2 control-label">{{ __('backend.title') }} 1</label>
									<div class="col-sm-9">
										<input type="text" name="title1[{{$key}}]" class="form-control" placeholder="{{ $locale }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">{{ __('backend.title') }} 2</label>
									<div class="col-sm-9">
										<input type="text" name="title2[{{$key}}]" class="form-control" placeholder="{{ $locale }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">{{ __('backend.content') }}</label>
									<div class="col-sm-9">
										<textarea name="content[{{$key}}]" class="form-control" placeholder="Textarea" rows="5"></textarea>
									</div>
								</div>					
							</div>
							@endforeach
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">{{ __('backend.image') }}</label>
							<div class="col-sm-9">
								<input type="file" name="image" class="btn btn-default">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-10">
								<button type="submit" class="btn btn-info">{{ __('backend.create') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection