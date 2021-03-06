@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.video'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.video'), 'link' => '']
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
							<a href="#" class="overlay">
								<span><i class="fa fa-play"></i></span>
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
							<a href="#" class="overlay">
								<span><i class="fa fa-play"></i></span>
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
							<a href="#" class="overlay">
								<span><i class="fa fa-play"></i></span>
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
							<a href="#" class="overlay">
								<span><i class="fa fa-play"></i></span>
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
							<a href="#" class="overlay">
								<span><i class="fa fa-play"></i></span>
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
							<a href="#" class="overlay">
								<span><i class="fa fa-play"></i></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
