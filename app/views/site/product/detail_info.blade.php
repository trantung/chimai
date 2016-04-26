<div class="detail_shop">
	<h1>{{ $data->name }}</h1>
	<ul class="detail_shop_spec">
		<li>{{ trans('captions.origin') }}: {{ Origin::find($data->origin_id)->name }}</li>
		<li>Size: 
			{{ implode(",", CommonSite::getSizeNameProduct($data)) }}    
		</li>
		<li>{{ trans('captions.surface') }}: {{ implode(",", CommonSite::getSurfaceNameProduct($data)) }}</li>
		<li>{{ trans('captions.category') }}: {{ implode(",", CommonSite::getCategoryNameProduct($data)) }}</li>
		<li>{{ trans('captions.material') }}: {{ Material::find($data->material_id)->name }}</li>
		<li>{{ trans('captions.description') }}: {{ $data->description }}</li>
		<li>{{ trans('captions.unit') }}: {{ AdminUnit::find($data->unit_id)->name }}</li>
	</ul>
	<div class="regular_price">
		@if($data->price_old)
		<span>{{ getFullPriceInVnd($data->price_old) }} {{ PRICE_UNIT }}</span>
		@endif
		<p>{{ getFullPriceInVnd($data->price) }} {{ PRICE_UNIT }}</p>
	</div>
	<!-- <p><strong>{{-- trans('captions.availability') --}}:</strong> {{-- getQtyProduct($data->qty) --}}</p> -->
	<div class="detail_cart">
		<a class="button add_cart" id="add_cart" ><i class="fa fa-shopping-cart"></i><span>{{ trans('captions.addtocart') }}</span></a>
		{{ Form::hidden('id', $data->id) }}
	</div>
</div>