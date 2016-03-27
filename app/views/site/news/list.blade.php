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

	<div class="main_container news">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<div class="news-inner">
					@foreach($data as $new)
					<div class="row">
						<div class="medium-3 columns">
							<img src="{{ url(CommonSlug::getImageUrlNotBox('AdminNew', $new)) }}" />
						</div>
						<div class="medium-9 columns">
							<h4><a href="{{ CommonSlug::getUrlSlug(TypeNew::find($new->type_new_id)->slug, $new->slug) }}">{{ $new->name }}</a></h4>
							<p>{{ CommonSlug::getSlugByModel($new, 'AdminNew')->sapo }}</p>
						</div>
					</div>
					@endforeach
					@if($data->getTotal() >= FRONENDPAGINATE)
						@include('site.common.paginate', array('input' => $data))
					@endif
				</div>
			</div>
			<div class="medium-3 medium-pull-9 columns">
				@include('site.news.sidebar')
			</div>
		</div>
	</div>

@stop
