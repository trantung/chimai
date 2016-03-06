@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.collection'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.collection'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container collect">
		<div class="row">
			<div class="column">
				<!--catalog list-->
				<div class="row">
					<div class="medium-4 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="{{ action('SiteCatalogueController@catalogue') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<a href="{{ action('SiteCatalogueController@catalogue') }}" class="overlay">
								<span>Catalogue</span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="{{ action('SiteCatalogueController@gallery') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<a href="{{ action('SiteCatalogueController@gallery') }}" class="overlay">
								<span>Showroom trưng bày</span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="{{ action('SiteCatalogueController@gallery') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<a href="{{ action('SiteCatalogueController@gallery') }}" class="overlay">
								<span>Công trình đã thực hiện</span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="{{ action('SiteCatalogueController@gallery') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<a href="{{ action('SiteCatalogueController@gallery') }}" class="overlay">
								<span>Công nhận chất lượng</span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="{{ action('SiteCatalogueController@gallery') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<a href="{{ action('SiteCatalogueController@gallery') }}" class="overlay">
								<span>Giải thưởng đạt được</span>
							</a>
						</div>
					</div>
					<div class="medium-4 columns">
						<div class="collect-item">
							<div class="grid_img">
								<a href="{{ action('SiteCatalogueController@video') }}"><img src="{{ url('assets/imgs/a1.jpg') }}"/></a>
							</div>
							<a href="{{ action('SiteCatalogueController@video') }}" class="overlay">
								<span>Video</span>
							</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>


@stop
