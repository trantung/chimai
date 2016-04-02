<?php $sideNews = CommonNews::getSideNews(); ?>
@if($sideNews)
<div class="side">
	<h3>{{ trans('captions.news') }}</h3>
	<ul>
		@foreach($sideNews as $value)
		<li><a href="{{ CommonSlug::getUrlSlug($value->slugType, $value->slug) }}"><i class="fa fa-caret-right"></i>{{ $value->name }}</a></li>
		@endforeach
	</ul>
</div>
@endif