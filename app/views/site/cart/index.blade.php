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
				@if(Cart::count() > 0)
					<form class="shopping_cart_form">
						<table width="100%">
							<thead>
								<tr>
									<th width="50"></th>
									<th>{{ trans('captions.product') }}</th>
									<th width="120">{{ trans('captions.color') }}</th>
									<th width="120">{{ trans('captions.size') }}</th>
									<th width="120">{{ trans('captions.surface') }}</th>
									<th width="50">{{ trans('captions.unit') }}</th>
									<th width="100">{{ trans('captions.unit_price') }}</th>
									<th width="100">{{ trans('captions.quanty') }}</th>
									<th width="100">{{ trans('captions.to_price') }}</th>
									<th width="70"></th>
								</tr>
							</thead>
							<tbody>
								<!-- START LIST PRODUCT -->
								@foreach($content as $key => $value)
									<tr>
										<td>
											<img src="{{ $value->options->image_url }}"/>
											{{ Form::hidden('rowid[]', $value->rowid) }}
										</td>
										<td class="shopping_cart_link"><a href="{{ $value->options->url }}">{{ $value->name }}</a></td>
										<td>{{ Form::select('color_id[]', CommonCart::getColorByProductId($value->id), $value->options->color_id, array('class' => 'form-control')) }}</td>
										<td>{{ Form::select('size_id[]', CommonCart::getSizeByProductId($value->id), $value->options->size_id, array('class' => 'form-control')) }}</td>
										<td>{{ Form::select('surface_id[]', CommonCart::getSurfaceByProductId($value->id), $value->options->surface_id, array('class' => 'form-control')) }}</td>
										<td>{{ $value->options->unit }}</td>
										<td>{{ getFullPriceInVnd($value->price) }}</td>
										<td>
											<div class="qty-holder">
											{{ Form::text('qty[]', $value->qty, array('class' => 'qty')) }}
											</div>
										</td>
										<td>{{ getFullPriceInVnd($value->subtotal) }}</td>
										<td>
											<a onclick="removeCart('{{ $value->rowid }}')"><i class="fa fa-times-circle-o"></i></a>
										</td>
									</tr>
								@endforeach
								<!-- END LIST PRODUCT -->
								<tr>
									<td colspan="7" class="order_table_right">{{ trans('captions.plus') }}</td>
									<td></td>
									<td colspan="2">{{ getFullPriceInVnd(Cart::total()) }}</td>
								</tr>
								<!-- <tr>
									<td colspan="7" class="order_table_right">{{-- trans('captions.discount') --}}</td>
									<td>5%</td>
									<td colspan="2">45.000</td>
								</tr> -->
								<!-- <tr>
									<td colspan="7" class="order_table_right">{{-- trans('captions.to_price') --}}</td>
									<td></td>
									<td colspan="2">855.000</td>
								</tr> -->
								<!-- <tr>
									<td colspan="7" class="order_table_right">Số điểm tích lũy lần này</td>
									<td></td>
									<td colspan="2">8</td>
								</tr> -->
								<!-- <tr>
									<td colspan="7" class="order_table_right">Số điểm tích lũy cộng dồn</td>
									<td></td>
									<td colspan="2">18</td>
								</tr> -->
							</tbody>
						</table>
						<div class="row shopping_cart_form2">
							<div class="columns medium-9 medium-push-3">
								<a title="" class="button button2 right" onclick="updateCart(1)">{{ trans('captions.order') }} <i class="fa fa-angle-double-right"></i></a>
								<a class="button button2 right" title="" id="update_cart" onclick="updateCart(0)">{{ trans('captions.update_cart') }}</a>
								<a title="" class="printOrder right" onclick="printOrder(1)">{{ trans('label.print_cart_order') }} <i class="fa fa-print"></i></a>
								<a title="" class="printOrder right" onclick="printOrder(0)">{{ trans('label.print_cart_order_qty') }} <i class="fa fa-print"></i></a>
								<div class="clearfix"></div>
							</div>
							<div class="columns medium-3 medium-pull-9">
								<div class="shopping_continue clearfix">
									<a href="{{ CommonSite::getUrlLang($lang) }}" class="left">
										<i class="fa fa-angle-double-left"></i> {{ trans('captions.countinue_shopping') }}
									</a>
								</div>
							</div>
						</div>
					</form>
				@else
					<p>{{ trans('captions.nodata') }}</p>
				@endif
			</div>
		</div>
	</div>

@include('site.cart.script')

@stop
