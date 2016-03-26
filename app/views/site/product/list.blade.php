@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.product'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $data->name_menu, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				@if(count($products) > 0)
					<!--product list-->
					<div class="grid">
						<div class="row">
							@foreach($products as $kProduct => $vProduct)
							<?php 
								if($kProduct == $products->getTotal()-1) {
									$end = 'end';
								} else {
									$end = '';
								} 
							?>
							<div class="medium-3 columns {{ $end }}">
								<div class="grid-item">
									<div class="grid_img">
										<a href="{{ url(LaravelLocalization::setLocale() . '/' . CommonSite::getOriginByProduct($vProduct->origin_id) . '/' . $vProduct->slug) }}"><img src="{{ url(CommonSlug::getImageUrlNotBox('Product', $vProduct)) }}" /></a>
									</div>
									<div class="grid_text">
										<a href="{{ url(LaravelLocalization::setLocale() . '/' . CommonSite::getOriginByProduct($vProduct->origin_id) . '/' . $vProduct->slug) }}" class="tille_pr"><p>{{ $vProduct->name }}</p></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!-- products end-->
					@if($products->getTotal() >= FRONENDPAGINATE)
						@include('site.common.paginate', array('input' => $products))
					@endif
				@endif
			</div>
			<!-- sidebar -->
			<div class="medium-3 medium-pull-9 columns">
				@include('site.product.sidebar')
			</div>
		</div>
	</div>

@stop
