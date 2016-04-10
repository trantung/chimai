@extends('site.layout.default')

@section('title')
	{{ $title = $title }}
@stop

@section('content')

	<?php
		if($boxType->parent_id == 0) {
			$breadcrumb = array(
				['name' => $title, 'link' => '']
			);	
		} else {
			$breadcrumb = array(
				['name' => $type->name_menu, 'link' => CommonSlug::getUrlSlug($type->slug)],
				['name' => $title, 'link' => '']
			);
		}
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container news">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<div class="news-inner">
					@foreach($data as $new)
					<?php $url = CommonSlug::getUrlSlug(Common::getFieldByModel('BoxType', $new->box_type_id, 'slug'), $new->slug); ?>
					<div class="row">
						<div class="medium-3 columns">
							<img src="{{ url(CommonSlug::getImageUrlNotBox('TypeNew', $new)) }}" />
						</div>
						<div class="medium-9 columns news-text">
							<h2><a href="{{ $url }}">{{ $new->name }}</a></h2>
							<p>
								{{ Common::getFieldByModel('TypeNew', $new->id, 'sapo') }}
								<a href="{{ $url }}" class="seemore">{{ trans('label.seemore') }}</a>
							</p>
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
