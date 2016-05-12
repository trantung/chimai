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
							<?php 
								$boxTypeParent = CommonSlug::getSlugByLanguage($value, 'BoxType');
								$boxTypeChild = CommonSlug::getBoxTypeChild($boxTypeParent->id);
								$boxTypeCount = count($boxTypeChild);
							?>
							@if($boxTypeCount > 0)
								<li class="has-dropdown">
							@else
								<li>
							@endif
								<a href="{{ action('SiteIndexController@slug', $boxTypeParent->slug) }}" title="">{{ $boxTypeParent->name_menu }}</a>
								@if($boxTypeCount > 0)
									<ul class="dropdown">
										@foreach($boxTypeChild as $valueBoxType)
											<li><a href="{{ action('SiteIndexController@slug', $valueBoxType->slug) }}">{{ $valueBoxType->name_menu }}</a></li>
										@endforeach
									</ul>
								@endif
							</li>
						@endif
						@if($value->model_name == 'BoxProduct')
							<?php 
								$boxProduct = CommonSlug::getSlugByLanguage($value, 'BoxProduct');
							?>
							<li class="has-dropdown">
								<a href="{{ action('SiteIndexController@slug', $boxProduct->slug) }}" title="">{{ $boxProduct->name_menu }}</a>
								<ul class="dropdown">
									@foreach(CommonSlug::getOriginByLanguage() as $k => $v )
										<li><a href="{{ action('SiteIndexController@slug', Origin::find($k)->slug) }}">{{ $v }}</a></li>
									@endforeach
								</ul>
							</li>
						@endif
						@if($value->model_name == 'BoxCollection')
							<?php 
								$boxCollection = CommonSlug::getSlugByLanguage($value, 'BoxCollection');
							?>
							<li class="has-dropdown">
								<a href="{{ action('SiteIndexController@slug', $boxCollection->slug) }}">{{ $boxCollection->name_menu }}</a>
								<ul class="dropdown">
									@foreach(CommonSlug::getCollectionContain($boxCollection->slug) as $valueCollection)
										@foreach($valueCollection as $box)
											<li><a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugContain($box, $box->model_name)->slug) }}">{{ CommonSlug::getNameObjectByLanguage($box) }}</a></li>
										@endforeach
									@endforeach
								</ul>
							</li>
						@endif
						@if($value->model_name == 'BoxPromotion')
							<?php 
								$boxPromotion = CommonSlug::getSlugByLanguage($value, 'BoxPromotion');
							?>
							<li>
								<a href="{{ action('SiteIndexController@slug', $boxPromotion->slug) }}" title="">{{ $boxPromotion->name_menu }}</a>
							</li>
						@endif
					@endforeach
					<li><a href="{{ action('SiteContactController@recruitment') }}" title="">{{ trans('captions.recruitment') }}</a></li>
					<li><a href="{{ action('SiteContactController@index') }}" title="">{{ trans('captions.contact') }}</a></li>
				</ul>
				<!--right -->
				<ul class="right show-for-medium-up">
					<li class="quick_cart"><a href="{{ action('SiteCartController@index') }}" class="mini-cart"><i class="fa fa-shopping-cart"></i> <span class="number_item">{{ Cart::count() }}</span></a></li>
				</ul>
			</section>
		</nav>
		<!-- End Header and Nav -->
	</div>
</div>