<form method="post" action="">
	<div class="contact_form_left">
		<div class="row">
			<ul class="medium-6 columns">
				<li>
					<label for="name">{{ trans('captions.fullname') }}</label>
					<input type="text" value="" id="name" name="name">
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
</form>