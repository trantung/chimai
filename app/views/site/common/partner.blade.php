<div class="main2">
	<div class="row">
		<h3 class="main2_tittle">
			<span>{{ trans('captions.partners') }}</span>
		</h3>
		<div class="medium-12 columns main2_colums2">
			<div class="brandslide" id="brandslide">
				@foreach($partners as $partner)
				<div class="brandslide_item">
					<a href="#brandslide_item" title=""><img alt="{{ $partner->name }}" src="{{ url(CommonSlug::getImageUrlNotBox('AdminSlide', $partner)) }}" title="{{ $partner->name }}" ></a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>