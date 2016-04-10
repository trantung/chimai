@extends('site.layout.default')

@section('title')
	{{ $title = $data->name }}
@stop

@section('content')

	<?php
		if($boxType->parent_id == 0) {
			$breadcrumb = array(
				['name' => $boxType->name_menu, 'link' => CommonSlug::getUrlSlug($boxType->slug)],
				['name' => $data->name, 'link' => '']
			);	
		} else {
			$breadcrumb = array(
				['name' => $type->name_menu, 'link' => CommonSlug::getUrlSlug($type->slug)],
				['name' => $boxType->name_menu, 'link' => CommonSlug::getUrlSlug($boxType->slug)],
				['name' => $data->name, 'link' => '']
			);
		}
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container news">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<div class="news-inner detail">
					<h1>{{ $data->name }}</h1>
					<div class="summary">
						{{ $data->sapo }} 
					</div>
					<div class="desc">
						{{ $data->description }}
					</div>
				</div>
			</div>
			<div class="medium-3 medium-pull-9 columns">
				@include('site.news.sidebar')
			</div>
		</div>
	</div>

@stop
