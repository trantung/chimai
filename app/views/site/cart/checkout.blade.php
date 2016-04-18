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
				{{ Form::open(array('action' => 'SiteCartController@checkoutSuccess', 'class' => 'submit-form')) }}
					<div class="row">
						<a href="{{ action('SiteCartController@index') }}" class="left"><i class="fa fa-angle-double-left"></i>&nbsp;{{ trans('captions.cart') }}</a>
					</div>
					@if(Cart::count() > 0)
						<div class="row">
							<div class="column shopping_cart_form">
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
										</tr>
									</thead>
									<tbody>
										@foreach($content as $key => $value)
											<tr>
												<td>
													<img src="{{ $value->options->image_url }}"/>
												</td>
												<td class="shopping_cart_link"><a href="{{ $value->options->url }}">{{ $value->name }}</a></td>
												<td>{{ Common::getFieldByModel('ProductImage', $value->options->color_id, 'name') }}</td>
												<td>{{ Common::getFieldByModel('Size', $value->options->size_id, 'name') }}</td>
												<td>{{ Common::getFieldByModel('Surface', $value->options->surface_id, 'name') }}</td>
												<td>{{ $value->options->unit }}</td>
												<td>{{ getFullPriceInVnd($value->price) }}</td>
												<td>{{ $value->qty }}</td>
												<td>{{ getFullPriceInVnd($value->subtotal) }}</td>
											</tr>
										@endforeach
										<!-- END LIST PRODUCT -->
										<tr>
											<td colspan="7" class="order_table_right">{{ trans('captions.plus') }}</td>
											<td></td>
											<td colspan="2">{{ getFullPriceInVnd(Cart::total()) }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					@endif
					<div class="row">
						<ul class="medium-6 columns checkout_account">
							<li><h4>{{ trans('captions.account_info') }}</h4></li>
							<li>
								<p><strong>{{ trans('captions.fullname') }}</strong>: {{ $data->fullname }}</p>
							</li>
							<li>
								<p><strong>{{ trans('captions.email') }}</strong>: {{ $data->email }}</p>
							</li>
							<li>
								<p><strong>{{ trans('captions.phone') }}</strong>: {{ $data->phone }}</p>
							</li>
							<li>
								<p><strong>{{ trans('captions.address') }}</strong>: {{ $data->address }}</p>
							</li>
						</ul>
						<ul class="medium-6 columns">
							<li>
	                            <label for="payment">{{ trans('captions.payment') }}<em>*</em></label>
	                            <div class="input-box">
	                                <select required name="payment" id="payment">
	                                    <option value="{{ PAYMENT1 }}">{{ trans('captions.payment_1') }}</option>
	                                    <option value="{{ PAYMENT2 }}">{{ trans('captions.payment_2') }}</option>
	                                    <option value="{{ PAYMENT3 }}">{{ trans('captions.payment_3') }}</option>
	                                </select>
	                            </div>
	                        </li>
							<li>
								<label for="message">{{ trans('captions.content') }}</label>
								<textarea rows="3" cols="5" id="message" name="message" maxlength="256"></textarea>
							</li>
							<li>
								<label class="left"><em>{{ trans('captions.required') }}</em></label>
								<button class="button right" type="submit">{{ trans('captions.order') }} <i class="fa fa-angle-double-right"></i></button>
							</li>
						</ul>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop
