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
					@foreach($data as $kVideo => $vVideo)
					<?php 
						$image = url('http://i1.ytimg.com/vi/' . $vVideo->video_id . '/sddefault.jpg');
					?>
						<div class="medium-4 columns {{ CommonSite::getClassEnd($kVideo, $data) }}">
							<div class="grid-item">
								<div class="grid_img">
									<a href="#"><img src="{{ $image }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>{{ $vVideo->name }}</p></a>
								</div>
								<a class="fancybox-media overlay" href="{{ $vVideo->link }}">
									<span><i class="fa fa-play"></i></span>
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
