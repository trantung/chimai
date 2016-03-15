@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.newsletter')}}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.newsletter'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container contact_form">
		<div class="row">
			<div class="column">
				<h2>{{ trans('captions.newsletter') }}</h2>
				@include('message')
				{{ Form::open(array('action' => 'SiteContactController@newsletterSend', 'method' => 'POST', 'class' => 'submit-form')) }}
					{{ Form::hidden('type', CONTACT_TYPE_NEWSLETTER) }}
					<div class="row">
                		<ul class="medium-6 columns">
							<li>
								<label for="email">{{ trans('captions.email') }} <em>*</em></label>
								<input type="email" value="" id="email" name="email" required>
							</li>
							<li>
								<label class="left"><em>{{ trans('captions.required') }}</em></label>
								<button class="button right" type="submit">{{ trans('captions.send') }}</button>
								<div class="clearfix"></div>
							</li>
						</ul>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop
