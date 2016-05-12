@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.recruitment'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.recruitment'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container contact_form">
		<div class="row">
			<div class="column contact_form_left">
				{{ Form::open(array('action' => 'SiteContactController@recruitmentPost', 'method' => 'POST', 'files'=> true)) }}
					<div class="row">
						<div class="medium-6 columns">
							{{ Form::hidden('type', CONTACT_TYPE_RECRUITMENT) }}
							<h3>{{ trans('captions.recruitment') }}</h3>
							<ul>
								<li>@include('message')</li>
								<li>
									<label for="name">{{ trans('captions.fullname') }} <em>*</em></label>
									<input type="text" value="" id="name" name="name" required>
								</li>
								<li>
									<label for="email">{{ trans('captions.email') }} <em>*</em></label>
									<input type="email" value="" id="email" name="email" required>
								</li>
								<li>
									<label for="phone">{{ trans('captions.phone') }} <em>*</em></label>
									<input type="text" value="" id="phone" name="phone" required>
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
									<label for="file_upload">{{ trans('captions.file') }}</label>
									<input type="file" value="" id="file_upload" name="file_upload">
								</li>
								<li>
									<label class="left"><em>{{ trans('captions.required') }}</em></label>
									<button class="button right" type="submit">{{ trans('captions.send') }}</button>
									<div class="clearfix"></div>
								</li>
							</ul>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop
