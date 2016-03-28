<ul class="box-gallery">
	@foreach(ProductImage::where('product_id', $data->id)->where('type', PRODUCT_PICTURE)->get() as $vImg)
	<li>
		<a class="fancybox" href="{{ url('images/'. UPLOAD_FOLDER_PICTURE . '/' . $data->id . '/' . $vImg->image_url) }}" data-fancybox-group="gallery" title="">
			<img src="{{ url('images/'. UPLOAD_FOLDER_PICTURE . '/' . $data->id . '/' . $vImg->image_url) }}" alt="" />
		</a>
	</li>
	@endforeach
</ul>