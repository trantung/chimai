<div class="bottom">
	<div class="row">

		<div class="medium-4 columns">
			<div class="bt-box">
				<h3>{{ trans('captions.product') }}</h3>
				<ul>
					@foreach(CommonSlug::getOriginByLanguage() as $k => $v )
					<li>
						<i class="fa fa-caret-right"></i>
						<a href="{{ action('SiteIndexController@slug', Origin::find($k)->slug) }}">{{ $v }}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="medium-4 columns">
			<div class="bt-box">
				<h3>{{ trans('captions.support') }}</h3>
				<ul>
					@foreach($footer as $value)
						@if($value->model_name == 'BoxType')
							<li>
								<i class="fa fa-caret-right"></i>
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxType')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxType')->name_footer }}</a>
							</li>
						@endif
						@if($value->model_name == 'BoxProduct')
							<li>
								<i class="fa fa-caret-right"></i>
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxProduct')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxProduct')->name_footer }}</a>
							</li>
						@endif
						@if($value->model_name == 'BoxCollection')
							<li>
								<i class="fa fa-caret-right"></i>
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxCollection')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxCollection')->name_footer }}</a>
							</li>
						@endif
						@if($value->model_name == 'BoxPromotion')
							<li>
								<i class="fa fa-caret-right"></i>
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxPromotion')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxPromotion')->name_footer }}</a>
							</li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>

		<div class="medium-4 columns">
			<div class="bt_newsletter">
				<h3>{{ trans('captions.follow') }}</h3>
				<div class="bottom-social">
					<a href="{{ CommonConfig::getCode(SOCIAL_URL_FACEBOOK) }}"><i class="fa fa-facebook"></i></a>
					<a href="{{ CommonConfig::getCode(SOCIAL_URL_GOOGLE) }}"><i class="fa fa-google-plus"></i></a>
					<a href="{{ CommonConfig::getCode(SOCIAL_URL_INSTAGRAM) }}"><i class="fa fa-instagram"></i></a>
				</div>
				<p class="bt_newsletter_title">{{ trans('captions.newsletter') }}</p>
				{{ Form::open(array('action' => 'SiteContactController@newsletter', 'method' => 'POST')) }}
					{{ Form::hidden('type', CONTACT_TYPE_NEWSLETTER) }}
					<div class="row collapse">
						<div class="small-7 columns">
							<div class="row collapse postfix-round">
								<input type="email" name="email" placeholder="{{ trans('captions.enter_email') }}" class="bt_newsletter_text">
							</div>
						</div>
						<div class="small-3 columns">
							<div class="row collapse postfix-round">
								<input class="postfix bt_newsletter_submit" type="submit" value="{{ trans('captions.send') }}">
							</div>
						</div>
						<div class="small-2 columns"></div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>