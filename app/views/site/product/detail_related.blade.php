<div class="grid">
	<div class="row">
		@foreach(CommonSite::getRelateProduct($data) as $kRelate => $vRelate)
			@if($kRelate == count(CommonSite::getRelateProduct($data)) - 1)
			<div class="medium-3 columns end">
			@else
			<div class="medium-3 columns">
			@endif
				<div class="grid-item">
					<div class="grid_img">
						<a href="{{ action('SiteIndexController@slugChild', [Origin::find($vRelate->origin_id)->slug, $vRelate->slug]) }}">
							<img src="{{ url(CommonSlug::getImageUrlNotBox('Product', $vRelate)) }}"/>
						</a>
					</div>
					<div class="grid_text">
						<a href="{{ action('SiteIndexController@slugChild', [Origin::find($vRelate->origin_id)->slug, $vRelate->slug]) }}" class="tille_pr">
						<p>{{ $vRelate->name }}</p>
						</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>