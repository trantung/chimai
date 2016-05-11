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
					<?php 
						$url = CommonSlug::getUrlSlug(Common::getFieldByModel('BoxType', $new->box_type_id, 'slug'), $new->slug); 
						$sapo = Common::getFieldByModel('TypeNew', $new->id, 'sapo');
					?>
					@if(!isset($new->image_url) || $sapo == '')
						<div class="row">
							<div class="medium-12 columns news-text">
								@if($sapo != '')
									<h2><a href="{{ $url }}">{{ $new->name }}</a></h2>
									<p>
										{{ $sapo }}
										<a href="{{ $url }}" class="seemore">{{ trans('label.seemore') }}</a>
									</p>
								@else
									<h2>{{ $new->name }}</h2>
									{{ $new->description }}
								@endif
							</div>
						</div>
					@else
						<div class="row">
							<div class="medium-3 columns">
								<a href="{{ $url }}"><img src="{{ url(CommonSlug::getImageUrlNotBox('TypeNew', $new)) }}" /></a>
							</div>
							<div class="medium-9 columns news-text">
								<h2><a href="{{ $url }}">{{ $new->name }}</a></h2>
								<p>
									{{ $sapo }}
									<a href="{{ $url }}" class="seemore">{{ trans('label.seemore') }}</a>
								</p>
							</div>
						</div>
					@endif
					@endforeach
					@if($data->getTotal() >= FRONENDPAGINATE_NEWS)
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
