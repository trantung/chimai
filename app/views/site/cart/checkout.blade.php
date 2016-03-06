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
				<form class="submit-form" action="{{ action('SiteCartController@checkout_success') }}" method="post">
					<div class="row">
						<a href="shopping_cart.html" class="left"><i class="fa fa-angle-double-left"></i>&nbsp;{{ trans('captions.cart') }}</a>
					</div>
					<div class="row">
						<ul class="medium-6 columns">
							<li>
								<label for="name">{{ trans('captions.fullname') }} <em>*</em></label>
								<input type="text" value="" id="name" name="name" required>
							</li>
							<li>
								<label for="email">{{ trans('captions.email') }} <em>*</em></label>
								<input type="email" value="" id="email" name="email" required>
							</li>
							<li>
								<label for="telephone">{{ trans('captions.phone') }} <em>*</em></label>
								<input type="text" value="" id="telephone" name="telephone" required>
							</li>
							<li>
								<label for="address">{{ trans('captions.address') }} <em>*</em></label>
								<input type="text" value="" id="address" name="address" required>
							</li>
						</ul>
						<ul class="medium-6 columns">
							<li>
	                            <label for="order_type">{{ trans('captions.payment') }}<em>*</em></label>
	                            <div class="input-box">
	                                <select required name="order_type" id="order_type">
	                                    <option value="">-- {{ trans('captions.select') }} --</option>
	                                    <option value="1">{{ trans('captions.payment_1') }}</option>
	                                    <option value="2">{{ trans('captions.payment_2') }}</option>
	                                    <option value="3">{{ trans('captions.payment_3') }}</option>
	                                </select>
	                            </div>
	                        </li>
							<li>
								<label for="message">{{ trans('captions.content') }}</label>
								<textarea rows="3" cols="5" id="message" name="message"></textarea>
							</li>
							<li>
								<label class="left"><em>{{ trans('captions.required') }}</em></label>
								<button class="button right" type="submit">{{ trans('captions.checkout') }}</button>
							</li>
						</ul>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop
