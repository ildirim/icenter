@extends('backend.layouts.app')
@section('main')
<div class="row">
	@if(Session::has('message' ))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="panel-heading">
		<div class="panel-title">Xəbərlər</div>
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
					<form class="form-horizontal" action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
						<div class="tab-content">
							{{ method_field('PUT')}}
							{{ csrf_field() }}
							@foreach(config('app.locales') as $key => $locale)
							<div class="tab-pane fade in @if($loop->iteration == 1) active @else  @endif" id="home{{$loop->iteration}}">
								<div class="form-group">
									<label class="col-sm-2 control-label">{{ __('backend.title') }}</label>
									<div class="col-sm-9">
										<input type="text" name="title[{{$key}}]" class="form-control" value="{{ $news->translate($key)->title }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">{{ __('backend.content') }}</label>
									<div class="col-sm-9">
										<textarea name="content[{{$key}}]" class="form-control" rows="5">{{ $news->translate($key)->content }}</textarea>
									</div>
								</div>
								
							</div>
							@endforeach
						</div>
						@foreach($images as $image)
						<div class="form-group">
							<label class="col-md-2 control-label">{{ __('backend.image') }}</label>
							<div class="col-md-2">
								<img src="/storage/news/{{ $image->image }}" width="50" height="50">
								<a href="{{ url('admin/news/'.$image->id . '/removeImage') }}"> {{ __('backend.delete') }} </a>
							</div>
							<div class="col-sm-8">
								<input type="file" name="{{ $image->id }}" class="btn btn-default">
							</div>
						</div>
						
						@endforeach
						<div class="form-group">
							<div class="col-sm-offset-10">
								<button type="submit" class="btn btn-info">{{ __('backend.change') }}</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection