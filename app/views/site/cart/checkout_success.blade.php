@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.checkout'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.checkout'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container checkout">
	<div class="row">
		<div class="column">
			<h2>{{ trans('captions.checkout') }}</h2>
			<div class="main_page">
				<h3>Đặt hàng thành công</h3>
				<p>Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất</p>
				<a href="{{ url('/') }}"><i class="fa fa-angle-double-left"></i>&nbsp;{{ trans('captions.countinue_shopping') }}</a>
			</div>
		</div>
	</div>
	
@stop
