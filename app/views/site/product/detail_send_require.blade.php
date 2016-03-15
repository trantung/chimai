{{ Form::open(array('action' => 'SiteContactController@contact', 'method' => 'POST')) }}
	{{ Form::hidden('type', CONTACT_TYPE_PRODUCT) }}
	@include('message')
	<div class="contact_form_left">
		<div class="row">
			<ul class="medium-6 columns">
				<li>
					<label for="name">{{ trans('captions.fullname') }}</label>
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
					<textarea rows="3" cols="5" id="message" name="message"></textarea>
				</li>
				<li>
					<label class="left"><em>{{ trans('captions.required') }}</em></label>
					<button class="button right" type="submit">{{ trans('captions.send') }}</button>
				</li>
			</ul>
			<ul class="medium-6 columns"></ul>
		</div>
	</div>
{{ Form::close() }}