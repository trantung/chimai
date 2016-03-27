@extends('site.layout.default')

@section('title')
	{{ $title = $title; }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $title, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container catalog">
		<div class="row">
			<div class="column">
				<!--catalog list-->
				<div class="row">
					@foreach($data as $kPdf => $vPdf)
						<div class="medium-2 columns {{ CommonSite::getClassEnd($kPdf, $data) }}">
							<div class="grid-item">
								<div class="grid_img">
									<a href="#"><img src="{{ url(CommonSlug::getImageUrlNotBox('AdminPdf', $vPdf)) }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>{{ $vPdf->name }}</p></a>
								</div>
								<a href="#" class="overlay">
									<span><i class="fa fa-link"></i></span>
								</a>
							</div>
						</div>
					@endforeach
				</div>
				<!-- catalog end-->
			</div>
		</div>
	</div>

@stop
