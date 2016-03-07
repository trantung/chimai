@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.gallery'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.gallery'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container catalog catalog1">
		<div class="row">
			<div class="column">
				<!--catalog list-->
				<div class="row">
					<div class="medium-4 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a class="fancybox overlay" href="{{ url('assets/imgs/a1.jpg') }}" data-fancybox-group="gallery">
								<span><i class="fa fa-search"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a class="fancybox overlay" href="{{ url('assets/imgs/a1.jpg') }}" data-fancybox-group="gallery">
								<span><i class="fa fa-search"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a class="fancybox overlay" href="{{ url('assets/imgs/a1.jpg') }}" data-fancybox-group="gallery">
								<span><i class="fa fa-search"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a class="fancybox overlay" href="{{ url('assets/imgs/a1.jpg') }}" data-fancybox-group="gallery">
								<span><i class="fa fa-search"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a class="fancybox overlay" href="{{ url('assets/imgs/a1.jpg') }}" data-fancybox-group="gallery">
								<span><i class="fa fa-search"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a class="fancybox overlay" href="{{ url('assets/imgs/a1.jpg') }}" data-fancybox-group="gallery">
								<span><i class="fa fa-search"></i></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('site.catalogue.script')

@stop
