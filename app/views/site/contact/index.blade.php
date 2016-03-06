@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.contact'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.contact'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container contact_form">
		<div class="row">
			<div class="column">
				<form class="contact_form_left">
					<div class="row">
						<div class="medium-6 columns">
							<form>
								<h3>{{ trans('captions.contact') }}</h3>
								<ul>
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
										<label for="address">{{ trans('captions.address') }}</label>
										<input type="text" value="" id="address" name="address">
									</li>
									<li>
										<label for="message">{{ trans('captions.content') }}</label>
										<textarea placeholder="" rows="3" cols="5" id="message" name="message"></textarea>
									</li>
									<li>
										<label class="left"><em>{{ trans('captions.required') }}</em></label>
										<button class="button right" type="submit">{{ trans('captions.send') }}</button>
									</li>
								</ul>
							</form>
						</div>
						<div class="medium-6 columns">
							<div class="bt_contact">
								<h3>{{ trans('captions.contact_info') }}</h3>
								<div class="bt_contact">
									<ul>
										<li>
											<i class="fa fa-map-marker"></i>
											<p>
											<strong>{{ trans('captions.address') }}:</strong>
											<span>123 Street Name, City, England</span>
											</p>
										</li>
										<li>
											<i class="fa fa-phone"></i>
											<p>
											<strong>{{ trans('captions.phone') }}:</strong>
											<span>(123) 456-7890</span>
											</p>
										</li>
										<li>
											<i class="fa fa-envelope-o"></i>
											<p>
											<strong>{{ trans('captions.email') }}:</strong>
											<span>aircoller@himani.com</span>
											</p>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											<p>
											<strong>{{ trans('captions.working_time') }}:</strong>
											<span>Mon - Sun / 9:00AM - 8:00PM</span>
											</p>
										</li>
									</ul>
								</div>
							</div>

							<div class="contact_map">
								@include('site.contact.map')
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop
