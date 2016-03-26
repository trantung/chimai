@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.aboutus'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.aboutus'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container about">
		@foreach($data as $typeNew)
			@if(!isset($typeNew->image_url))
				<div class="row">
					<div class="column">
						<h4>
							<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByModel($typeNew, 'TypeNew')->slug) }}" title="">
								{{ CommonSlug::getSlugByModel($typeNew, 'TypeNew')->name }}
							</a>
						</h4>
						{{ CommonSlug::getSlugByModel($typeNew, 'TypeNew')->sapo }}
					</div>
				</div>
			@else
				<div class="row">
					<div class="medium-3 columns">
					<img src="{{ url(CommonSlug::getImageUrlNotBox('TypeNew', $typeNew)) }}" alt="" />
					</div>
					<div class="medium-9 columns">
						<h4>
							<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByModel($typeNew, 'TypeNew')->slug) }}" title="">
								{{ CommonSlug::getSlugByModel($typeNew, 'TypeNew')->name }}
							</a>
						</h4>
						{{ CommonSlug::getSlugByModel($typeNew, 'TypeNew')->sapo }}
					</div>
				</div>
			@endif
		@endforeach

	</div>

@stop
