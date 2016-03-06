@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.orders_detail'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.orders_detail'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container orders">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<h2>{{ trans('captions.orders_detail') }}</h2>
				<div class="main_page">
					<h3>Order #1500000046 - Pending</h3>
					<p><b>Order Date:</b> September 11, 2015</p>
					<p><b>Shipping Address:</b> 147 Street Name, City, England</p>
					<p><b>Shipping Method:</b> Flat Rate - Fixed</p>
					<p><b>Billing Address:</b> 147 Street Name, City, England</p>
					<p><b>Payment Method:</b> Check / Money order</p>
					<h3>Items Ordered </h3>
					<table width="100%">
						<thead>
							<tr>
								<th>Product Name</th>
								<th width="100">SKU</th>
								<th width="100">Unit Price</th>
								<th width="100">Quantity</th>
								<th width="100">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>The Triangle 5kW Cool/ 6kW Heat Capacity</td>
								<td>AR-18FSSSCWK1</td>
								<td class="order_table_right">$1,390</td>
								<td>Ordered:1</td>
								<td class="order_table_right">$1,390</td>
							</tr>
							<tr>
								<td>L-Vogue Plus Hot & Cold , Mosquito Away </td>
								<td>V13APB</td>
								<td class="order_table_right">$1,390</td>
								<td>Ordered:1</td>
								<td class="order_table_right">$1,390</td>
							</tr>
							<tr>
								<td colspan="4" class="order_bottom">
									<p>Subtotal</p>
									<p>Shipping & Handling</p>
									<p><b>Grand Total</b></p>
								</td>
								<td class="order_bottom">
									<p>$2,780</p>
									<p>$5.00</p>
									<p><b>$2,785</b></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="shopping_continue clearfix">
						<a href="{{ action('SiteOrdersController@orders') }}" class="left"><i class="fa fa-angle-double-left"></i> Danh sách đơn hàng</a>
					</div>
				</div>
			</div>
			<div class="medium-3 medium-pull-9 columns">
				@include('site.user.sidebar')
			</div>
		</div>
	</div>

@stop
