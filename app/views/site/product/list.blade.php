@extends('site.layout.default')

@section('title')
	{{ $title = $title }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $title, 'link' => '']
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
								$url = CommonSlug::getUrlSlug(CommonSite::getOriginByProduct($vProduct->origin_id), $vProduct->slug);
							?>
							<div class="medium-3 columns {{ CommonSite::getClassEnd($kProduct, $products) }}">
								<div class="grid-item">
									<div class="grid_img">
										<a href="{{ $url }}"><img src="{{ url(CommonSlug::getImageUrlNotBox('Product', $vProduct)) }}" /></a>
									</div>
									<div class="grid_text">
										<a href="{{ $url }}" class="tille_pr"><p>{{ $vProduct->name }}</p></a>
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
				@else
					<p>{{ trans('captions.nodata') }}</p>
				@endif
			</div>
			<!-- sidebar -->
			<div class="medium-3 medium-pull-9 columns">
				@include('site.product.sidebar')
			</div>
		</div>
	</div>

@stop
