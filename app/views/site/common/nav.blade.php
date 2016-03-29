<div class="navbar">
	<div class="row">
		<!-- Header and Nav -->
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<a class="name_logo" href="{{ CommonSite::getUrlLang($lang) }}"><img src="{{ url('assets/imgs/logo.png') }}"/></a>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>{{ trans('captions.menu') }}</span></a></li>
			</ul>
			<section class="top-bar-section">
				<!-- Left Nav Section -->
				<ul class="left">
					<li class="active"><a href="{{ CommonSite::getUrlLang($lang) }}" title="">{{ trans('captions.home') }}</a></li>
					@foreach($menu as $value)
						@if($value->model_name == 'BoxType')
							<li>
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxType')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxType')->name_menu }}</a>
							</li>
						@endif
						@if($value->model_name == 'BoxProduct')
							<li class="has-dropdown">
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxProduct')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxProduct')->name_menu }}</a>
								<ul class="dropdown">
									@foreach(CommonSlug::getOriginByLanguage() as $k => $v )
										<li><a href="{{ action('SiteIndexController@slug', Origin::find($k)->slug) }}">{{ $v }}</a></li>
									@endforeach
								</ul>
							</li>
						@endif
						@if($value->model_name == 'BoxCollection')
							<li class="has-dropdown">
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxCollection')->slug) }}">{{ CommonSlug::getSlugByLanguage($value, 'BoxCollection')->name_menu }}</a>
								<ul class="dropdown">
									@foreach(CommonSlug::getCollectionContain(CommonSlug::getSlugByLanguage($value, 'BoxCollection')->slug) as $valueCollection)
										@foreach($valueCollection as $box)
											<li><a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugContain($box, $box->model_name)->slug) }}">{{ CommonSlug::getNameObjectByLanguage($box) }}</a></li>
										@endforeach
									@endforeach
								</ul>
							</li>
						@endif
						@if($value->model_name == 'BoxPromotion')
							<li>
								<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxPromotion')->slug) }}" title="">{{ CommonSlug::getSlugByLanguage($value, 'BoxPromotion')->name_menu }}</a>
							</li>
						@endif
					@endforeach
					<li><a href="{{ action('SiteContactController@index') }}" title="">{{ trans('captions.contact') }}</a></li>
				</ul>
				<!--right -->
				<ul class="right show-for-medium-up">
					<li class="quick_cart"><a href="shopping_cart.html" class="mini-cart"><i class="fa fa-shopping-cart"></i> <span class="number_item">2</span></a></li>
				</ul>
			</section>
		</nav>
		<!-- End Header and Nav -->
	</div>
</div>