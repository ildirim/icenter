@extends('backend.layouts.app')
@section('main')
<div class="row">
	@if(Session::has('message' ))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="panel-heading">
		<div class="panel-title">Media</div>
		<div class="panel-options">
			<a class="btn btn-default" onclick="goBack()" data-rel="collapse"><i class="fa fa-reply"></i> <b>Geri</b></a>
			<!-- <a class="btn btn-default"  href="{{ route('contentServices.index') }}" data-rel="reload"><i class="fa fa-align-center"></i> <b>Hamisi</b></a> -->
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
					
					<li role="presentation" class="@if($loop->iteration == 1) active  @endif"><a href=".home{{ $loop->iteration }}" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">{{ $locale}}</a></li>
					@endforeach
					
				</ul>
				<div id="myTabContent" class="tab-content">
					<form class="form-horizontal" action="{{ route('mediaUpdate', $mediaproduct->id) }}" method="post" enctype="multipart/form-data">
						<div class="tab-content">
							@csrf
							@foreach(config('app.locales') as $key => $locale)
							<div class="tab-pane fade in @if($loop->iteration == 1) active @else  @endif home{{$loop->iteration}}">
								<div class="form-group">
									<label class="col-sm-2 control-label">Şəkilin Məzmunu</label>
									<div class="col-sm-9">
										<textarea name="imagecontent[{{$key}}]" class="form-control" rows="5">{{ $mediaproduct->translate($key)->image_content }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Lorem başlıq</label>
									<div class="col-sm-9">
										<input type="text" name="loremtitle1[{{$key}}]" class="form-control" value="{{ $mediaproduct->translate($key)->lorem_title1 }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Lorem başlıq</label>
									<div class="col-sm-9">
										<input type="text" name="loremtitle2[{{$key}}]" class="form-control" value="{{ $mediaproduct->translate($key)->lorem_title2 }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Lorem Məzmun</label>
									<div class="col-sm-9">
										<textarea name="loremcontent[{{$key}}]" class="form-control" rows="5">{{ $mediaproduct->translate($key)->lorem_content }}</textarea>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">{{ __('backend.image') }}</label>
							<div class="col-sm-9">
								<input type="file" name="image" class="btn btn-default">
								@if($mediaproduct->image)
								<a style="font-size: 16px" target="_blank" href="/storage/media/{{ $mediaproduct->image }}">{{ __('backend.show') }}</a>
								@endif
							</div>
						</div>
						<div class="tab-content">
							@foreach(config('app.locales') as $key => $locale)
							<div class="tab-pane fade in @if($loop->iteration == 1) active @else  @endif home{{$loop->iteration}}">
								<div class="form-group">
									<label class="col-sm-2 control-label">Videonun Başlığı</label>
									<div class="col-sm-9">
										<input type="text" name="videotitle1[{{$key}}]" class="form-control" value="{{ $mediaproduct->translate($key)->video_title1 }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Videonun Başlığı</label>
									<div class="col-sm-9">
										<input type="text" name="videotitle2[{{$key}}]" class="form-control" value="{{ $mediaproduct->translate($key)->video_title2 }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Videonun Məzmunu</label>
									<div class="col-sm-9">
										<textarea name="videocontent[{{$key}}]" class="form-control" rows="5">{{ $mediaproduct->translate($key)->video_content }}</textarea>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Video (Youtube URL)</label>
							<div class="col-sm-9">
								<input type="text" name="video" class="form-control" value="{{ $mediaproduct->video }}">
							</div>
						</div>
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
</div>
@endsection