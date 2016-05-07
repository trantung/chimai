<div class="detail_image">
	<ul id="etalage">
		@foreach(CommonSlug::getListProductImageVi($data, PRODUCT_COLOR) as $kImage => $vImage)
		<li>
			<img class="etalage_source_image" src="{{ url('images/'. UPLOAD_FOLDER_COLOR . '/' . $vImage->product_id . '/' . $vImage->image_url) }}" title="{{ $vImage->name . ' - ' . getQtyProduct($vImage->qty) . ' (' . $vImage->qty . ')' }}" />
			<!-- <p>{{-- $vImage->name . ' - ' . getQtyProduct($vImage->qty) . ' (' . $vImage->qty . ')' --}}</p> -->
			<p>{{ $vImage->name }}</p>	
		@endforeach
	</ul>
<!--                                <div class="etalage-control">
		<a class="etalage-prev" href="javascript:void(0)"><i class="icon-angle-left"></i></a>
		<a class="etalage-next" href="javascript:void(0)"><i class="icon-angle-right"></i></a>
	</div>-->
	<div class="clearfix"></div>
</div>