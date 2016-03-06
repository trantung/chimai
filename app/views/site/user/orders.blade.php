@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.orders'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.orders'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container orders">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<h2>{{ trans('captions.orders') }}</h2>
				<div class="main_page">
					<table width="100%">
						<thead>
							<tr>
								<th width="100">Order #</th>
								<th width="100">Date</th>
								<th width="300">Ship To</th>
								<th width="150">Order Total</th>
								<th width="150">Order Status</th>
								<th width="100"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1500000046</td>
								<td>9/11/2015</td>
								<td>147 Street Name, City, England</td>
								<td>$2,785</td>
								<td><i>Pending</i></td>
								<td><a href="{{ action('SiteOrdersController@orders_detail') }}">View Order</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="medium-3 medium-pull-9 columns">
				@include('site.user.sidebar')
			</div>
		</div>
	</div>

@stop
