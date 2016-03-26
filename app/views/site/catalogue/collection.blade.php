@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.collection'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $data->name_menu, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container collect">
		<div class="row">
			<div class="column">
				<!--catalog list-->
				<div class="row">
					@foreach($boxPdfs as $kBoxPdf => $vBoxPdf)
					<div class="medium-3 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url(CommonSlug::getImageUrlNotBox('BoxPdf', $vBoxPdf)) }}"/></a>
							</div>
							<a href="#" class="collect-text">
								<span>{{ $vBoxPdf->name}}</span>
							</a>
						</div>
					</div>
					@endforeach

					@foreach($boxShowRooms as $kBoxShowRoom => $vBoxShowRoom)
					<div class="medium-3 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url(CommonSlug::getImageUrlNotBox('BoxShowRoom', $vBoxShowRoom)) }}"/></a>
							</div>
							<a href="#" class="collect-text">
								<span>{{ $vBoxShowRoom->name}}</span>
							</a>
						</div>
					</div>
					@endforeach

					@foreach($boxVideos as $kBoxVideo => $vBoxVideo)
					<div class="medium-3 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url(CommonSlug::getImageUrlNotBox('BoxVideo', $vBoxVideo)) }}"/></a>
							</div>
							<a href="#" class="collect-text">
								<span>{{ $vBoxVideo->name}}</span>
							</a>
						</div>
					</div>
					@endforeach

					
					
				</div>
			</div>
		</div>
	</div>

@stop
