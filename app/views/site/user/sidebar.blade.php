<div class="side">
	<h3>{{ trans('captions.menu') }}</h3>
	<ul>
		<li><a href="{{ action('SiteUserController@account') }}"><i class="fa fa-caret-right"></i>{{ trans('captions.account') }}</a></li>
		<li><a href="{{ action('SiteOrdersController@orders') }}"><i class="fa fa-caret-right"></i>{{ trans('captions.orders') }}</a></li>
		<li><a href="{{ action('SiteCartController@index') }}"><i class="fa fa-caret-right"></i>{{ trans('captions.cart') }}</a></li>
		<li><a href="{{ action('SiteController@logout') }}"><i class="fa fa-caret-right"></i>{{ trans('captions.logout') }}</a></li>
	</ul>
</div>