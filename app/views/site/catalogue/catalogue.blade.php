@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.catalogue'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.catalogue'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container catalog">
		<div class="row">
			<div class="column">
				<!--catalog list-->
				<div class="row">
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					<div class="medium-2 columns">
						<div class="grid-item">
							<div class="grid_img">
								<a href="#"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<div class="grid_text">
								<a href="#" class="tille_pr"><p>Calacatta</p></a>
							</div>
							<a href="#" class="overlay">
								<span><i class="fa fa-link"></i></span>
							</a>
						</div>
					</div>
					
				</div>
				<!-- catalog end-->
				<!-- <div class="paging paging2">
					<ul>
						<li class="previous hidden"><a href="#"><i class="fa fa-caret-left"></i></a></li>
						<li class="current">1</li>
						<li><a href="products_2.html">2</a></li>
						<li><a href="products_3.html">3</a></li>
						<li class="next"><a href="products_2.html"><i class="fa fa-caret-right"></i></a></li>
					</ul>
				</div> -->
			</div>
		</div>
	</div>

@stop
