@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.product'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.product'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<!--product list-->
				<div class="grid">
					<div class="row">
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="grid-item">
								<div class="grid_img">
									<a href="{{ action('SiteProductController@detail') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
								</div>
								<div class="grid_text">
									<a href="#" class="tille_pr"><p>Calacatta</p></a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<!-- products end-->
				<div class="row">
					<div class="paging paging2">
						<ul>
							<li class="previous hidden"><a href="#"><i class="fa fa-caret-left"></i></a></li>
							<li class="current">1</li>
							<li><a href="products_2.html">2</a></li>
							<li><a href="products_3.html">3</a></li>
							<li class="next"><a href="products_2.html"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- sidebar -->
			<div class="medium-3 medium-pull-9 columns">
				@include('site.product.sidebar')
			</div>
		</div>
	</div>

@stop
