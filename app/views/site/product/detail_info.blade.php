<div class="detail_shop">
	<h1>{{ $data->name }}</h1>
	<ul class="detail_shop_spec">
		<li>Origin: {{ Origin::find($data->origin_id)->name }}</li>
		<li>Size: 
			{{ implode(",", CommonSite::getSizeNameProduct($data)) }}    
		</li>
		<li>Material: {{ implode(",", CommonSite::getMaterialNameProduct($data)) }}</li>
		<li>Category: {{ implode(",", CommonSite::getCategoryNameProduct($data)) }}</li>
		<li>Surface: {{ Surface::find($data->surface_id)->name }}</li>
		<li>Description: {{ $data->description }}</li>
	</ul>
	<div class="regular_price">
		@if($data->price_old)
		<span>{{ getFullPriceInVnd($data->price_old) }} &#273;</span>
		@endif
		<p>{{ getFullPriceInVnd($data->price) }} &#273;</p>
	</div>
	<p><strong>{{ trans('captions.availability') }}:</strong> {{ getQtyProduct($data->qty) }}</p>
	<div class="detail_cart">
		<a class="button add_cart"><i class="fa fa-shopping-cart"></i><span>{{ trans('captions.order_by') }}</span></a>
	</div>
</div>