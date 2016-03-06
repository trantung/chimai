@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.account_info'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.account_info'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container create_an_account">
		<div class="row">
			<div class="column">
				<h2>{{ trans('captions.account_info') }}</h2>
				<form class="submit-form">
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
								<div>
									<label for="password">{{ trans('captions.password') }}</label>
									<input type="password" class="input-text" id="password" name="password">
								</div>
							</li>
							<li>
								<div class="row">
									<div class="medium-6 columns">
										<label for="password">{{ trans('captions.new_password') }}</label>
										<input type="password" class="input-text" id="password" name="password">
									</div>
									<div class="medium-6 columns">
										<label for="confirmation">{{ trans('captions.confirm_new_password') }}</label>
										<input type="password" class="input-text" id="confirmation" name="confirmation">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="column">
							<a href="index.html" class="left"><i class="fa fa-angle-double-left"></i>{{ trans('captions.home') }}</a>
							<button class="button right" type="submit">{{ trans('captions.save') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop
