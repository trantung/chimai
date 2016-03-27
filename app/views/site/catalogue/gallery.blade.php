@extends('site.layout.default')

@section('title')
	{{ $title = $title }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $title, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container catalog catalog1">
		<div class="row">
			<div class="column">
				<!--catalog list-->
				<div class="row">
					@foreach($data as $kGallery => $vGallery)
					<?php 
						$image = url(CommonSlug::getImageUrlNotBox('AdminImage', $vGallery));
					?>
						<div class="medium-4 columns {{ CommonSite::getClassEnd($kGallery, $data) }}">
							<div class="grid-item">
								<div class="grid_img">
									<a href="#"><img src="{{ $image }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>{{ $vGallery->name }}</p></a>
								</div>
								<a class="fancybox overlay" href="{{ $image }}" data-fancybox-group="gallery">
									<span><i class="fa fa-search"></i></span>
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	@include('site.catalogue.script')

@stop
