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
				{{ Form::open(array('action' => 'SiteUserController@doAccount', 'method' => 'PUT', 'class' => 'submit-form', 'files' => true)) }}
					<div class="row">
						<div class="column">@include('message')</div>
						<ul class="medium-6 columns">
							<li>
								<label for="fullname">{{ trans('captions.fullname') }} <em>*</em></label>
								<input type="text" value="{{ $data->fullname }}" id="fullname" name="fullname" required maxlength="256">
							</li>
							<li>
								<label for="email">{{ trans('captions.email') }} <em>*</em></label>
								<input type="email" value="{{ $data->email }}" id="email" name="email" required maxlength="256">
							</li>
							<li>
								<label for="phone">{{ trans('captions.phone') }} <em>*</em></label>
								<input type="text" value="{{ $data->phone }}" id="phone" name="phone" required maxlength="256">
							</li>
							<li>
								<label for="address">{{ trans('captions.address') }}</label>
								<input type="text" value="{{ $data->address }}" id="address" name="address" maxlength="256">
							</li>
						</ul>
						<ul class="medium-6 columns">
							<li>
								<div>
									<label for="password">{{ trans('captions.password') }}</label>
									<input type="password" class="input-text" id="password" name="password" minlength="6" maxlength="256">
								</div>
							</li>
							<li>
								<div class="row">
									<div class="medium-6 columns">
										<label for="password_new">{{ trans('captions.new_password') }}</label>
										<input type="password" class="input-text" id="password_new" name="password_new" minlength="6" maxlength="256">
									</div>
									<div class="medium-6 columns">
										<label for="password_new2">{{ trans('captions.confirm_new_password') }}</label>
										<input type="password" class="input-text" id="password_new2" name="password_new2" minlength="6" maxlength="256">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="column">
							<a href="{{ CommonSite::getUrlLang($lang) }}" class="left"><i class="fa fa-angle-double-left"></i>{{ trans('captions.home') }}</a>
							<button class="button right" type="submit">{{ trans('captions.save') }}</button>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop
