<div class="navbar">
	<div class="row">
		<!-- Header and Nav -->
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<a class="name_logo" href="{{ url('/') }}"><img src="{{ url('assets/imgs/logo.png') }}"/></a>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>{{ trans('captions.menu') }}</span></a></li>
			</ul>
			<section class="top-bar-section">
				<!-- Left Nav Section -->
				<ul class="left">
					<li class="active"><a href="{{ url('/') }}" title="">{{ trans('captions.home') }}</a></li>
					<li><a href="{{ action('SiteAboutController@index') }}" title="">{{ trans('captions.aboutus') }}</a></li>
					<li class="has-dropdown">
						<a href="{{ action('SiteProductController@index') }}" title="">Sản phẩm</a>
						<ul class="dropdown">
							<li><a href="#">Gạch ốp lát Tây Ban Nha</a></li>
							<li><a href="#">Gạch ốp lát Úc</a></li>
							<li><a href="#">Gạch ốp lát Mỹ</a></li>
							<li><a href="#">Gạch ốp lát Đức</a></li>
							<li><a href="#">Gạch ốp lát Trung quốc</a></li>
						</ul>
					</li>
					<li><a href="{{ action('SiteProductController@index') }}" title="">Khuyến mại</a></li>
					<li class="has-dropdown">
						<a href="{{ action('SiteCatalogueController@collection') }}">Bộ sưu tập</a>
						<ul class="dropdown">
							<li><a href="{{ action('SiteCatalogueController@catalogue') }}">Catelogue</a></li>
							<li><a href="{{ action('SiteCatalogueController@gallery') }}">Showroom trưng bày</a></li>
							<li><a href="{{ action('SiteCatalogueController@gallery') }}">Công trình đã thực hiện</a></li>
							<li><a href="{{ action('SiteCatalogueController@gallery') }}">Chứng nhận chất lượng</a></li>
							<li><a href="{{ action('SiteCatalogueController@gallery') }}">Giải thưởng đạt được</a></li>
							<li><a href="{{ action('SiteCatalogueController@video') }}">Videos</a></li>
						</ul>
					</li>
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