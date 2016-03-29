<div class="main1 show-for-medium-up">
	<div class="homeslide" id="homeslide">
		@foreach($banners as $banner)
			<div class="homeslide_item">
				<a href="#" title="">
					<img alt="{{ $banner->name }}" src="{{ url(CommonSlug::getImageUrlNotBox('AdminSlide', $banner)) }}" title="{{ $banner->name }}" >
					<div class="slide_text">{{ $banner->name }}</div>
				</a>
			</div>
		@endforeach
	</div>
</div>