<div class="top">
	<div class="row">
		<div class="medium-12 columns">
			<ul class="right">
				<li><a href="{{ action('SiteUserController@account') }}"><i class="fa fa-user"></i>{{ trans('captions.account') }}</a></li>
				<li><a href="{{ action('SiteController@logout') }}"><i class="fa fa-power-off"></i>{{ trans('captions.logout') }}</a></li>
				<li><a href="{{ action('SiteController@login') }}"><i class="fa fa-power-off"></i>{{ trans('captions.login') }}</a></li>
				<li><a href="{{ action('SiteUserController@create') }}"><i class="fa fa-user"></i>{{ trans('captions.register') }}</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="header show-for-medium-up">
	<div class="row">
		<div class="medium-3 columns logo">
			<a href="{{ url('/') }}"><img src="{{ url('assets/imgs/logo.png') }}" alt="" /></a>
		</div>

		<div class="medium-5 columns search-area">
			{{ Form::open(array('action' => 'SiteIndexController@search', 'method'=>'GET', 'class' => 'form-search', 'id' => 'searchIndex')) }}
				<div class="row collapse">
					<div class="small-11 columns">
						<div class="row collapse postfix-round input_search">
							<input type="text" name="searchIndex" placeholder="Search">
						</div>
					</div>
					<div class="small-1 columns input_search">
						<div class="row collapse postfix-round">
						  <a onclick="$('#searchIndex').submit()" class="postfix input_search_a"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div class="medium-4 columns cart-area">
			<div class="custom-block">
				<ul>
					<li><i class="fa fa-phone"></i>{{ CommonConfig::getCode(HOTLINE_PHONE) }}</li>

					@include('site.common.lang')

					<li><a href="{{ action('SiteCartController@index') }}" class="mini-cart"><i class="fa fa-shopping-cart"></i><span class="number_item">2</span></a></li>
				</ul> 
			</div>
		</div>
	</div>
</div>
<!-- Show for mobile -->
<div class="row show-for-small-down">
	<div class="columns">
		<form class="form-search">
			<div class="row collapse">
				<div class="small-11 columns">
					<div class="row collapse postfix-round input_search">
						<input type="text" placeholder="Search">
					</div>
				</div>
				<div class="small-1 columns input_search">
					<div class="row collapse postfix-round">
						<a href="#" class="postfix input_search_a"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="columns cart-area">
		<div class="custom-block">
			<ul>
				<li><i class="fa fa-phone"></i>{{ CommonConfig::getCode(HOTLINE_PHONE) }}</li>
				
				@include('site.common.lang')

				<li><a href="{{ action('SiteCartController@index') }}" class="mini-cart"><i class="fa fa-shopping-cart"></i><span class="number_item">2</span></a></li>
			</ul> 
		</div>
	</div>
</div>