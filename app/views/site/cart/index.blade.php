@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.cart'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.cart'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container shopping_cart">
		<div class="row">
			<div class="column">
				<h2>{{ trans('captions.cart') }}</h2>
				<form class="shopping_cart_form">
					<table width="100%">
						<thead>
							<tr>
								<th width="50"></th>
								<th>{{ trans('captions.product') }}</th>
								<th width="150">{{ trans('captions.unit') }}</th>
								<th width="150">{{ trans('captions.unit_price') }}</th>
								<th width="150">{{ trans('captions.quanty') }}</th>
								<th width="150">{{ trans('captions.to_price') }}</th>
								<th width="70"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><img src="{{ url('assets/imgs/a1.jpg') }}"/></td>
								<td class="shopping_cart_link"><a href="products_detail.html">Calacatta</a></td>
								<td>m2</td>
								<td>300.000</td>
								<td>
									<div class="qty-holder">
										<input class="qty" type="text" value="1" name="qty[]">
									</div>
								</td>
								<td>300.000</td>
								<td><a href="#"><i class="fa fa-times-circle-o"></i></a></td>
							</tr>
							<tr>
								<td><img src="{{ url('assets/imgs/a1.jpg') }}"/></td>
								<td class="shopping_cart_link"><a href="products_detail.html">Calacatta</a></td>
								<td>viên</td>
								<td>300.000</td>
								<td>
									<div class="qty-holder">
										<input class="qty" type="text" value="2" name="qty[]">
									</div>
								</td>
								<td>600.000</td>
								<td><a href="#"><i class="fa fa-times-circle-o"></i></a></td>
							</tr>
							<tr>
								<td colspan="4" class="order_table_right">{{ trans('captions.plus') }}</td>
								<td></td>
								<td colspan="2">900.000</td>
							</tr>
							<tr>
								<td colspan="4" class="order_table_right">{{ trans('captions.discount') }}</td>
								<td>5%</td>
								<td colspan="2">45.000</td>
							</tr>
							<tr>
								<td colspan="4" class="order_table_right">{{ trans('captions.to_price') }}</td>
								<td></td>
								<td colspan="2">855.000</td>
							</tr>
							<tr>
								<td colspan="4" class="order_table_right">Số điểm tích lũy lần này</td>
								<td></td>
								<td colspan="2">8</td>
							</tr>
							<tr>
								<td colspan="4" class="order_table_right">Số điểm tích lũy cộng dồn</td>
								<td></td>
								<td colspan="2">18</td>
							</tr>
						</tbody>
					</table>
					<div class="row shopping_cart_form2">
						<div class="columns medium-6 medium-push-6">
							<a href="{{ action('SiteCartController@checkout') }}" title="" class="button button2 right">{{ trans('captions.order') }} <i class="fa fa-angle-double-right"></i></a>
							<a class="button button2 right" title="">{{ trans('captions.update_cart') }}</a>
							<div class="clearfix"></div>
						</div>
						<div class="columns medium-6 medium-pull-6">
							<div class="shopping_continue clearfix">
								<a href="{{ url('/') }}" class="left">
									<i class="fa fa-angle-double-left"></i> {{ trans('captions.countinue_shopping') }}
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop
