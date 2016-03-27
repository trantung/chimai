@extends('site.layout.default')

@section('title')
	{{ $title = $data->name }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $type->name, 'link' => CommonSlug::getUrlSlug($type->slug)],
			['name' => $data->name, 'link' => '']
		);
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
