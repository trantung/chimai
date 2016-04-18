@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.order'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.order'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container checkout">
	<div class="row">
		<div class="column">
			<h2>{{ trans('captions.order') }}</h2>
			<div class="main_page">
				<h3>{{ trans('messages.order_success') }}</h3>
				<p>{{ trans('messages.order_success_msg') }}</p>
				<a href="{{ CommonSite::getUrlLang($lang) }}"><i class="fa fa-angle-double-left"></i>&nbsp;{{ trans('captions.countinue_shopping') }}</a>
			</div>
		</div>
	</div>
	
@stop
