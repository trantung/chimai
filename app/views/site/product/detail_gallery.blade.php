<ul class="box-gallery">
	@foreach(CommonSlug::getListProductImageVi($data, PRODUCT_PICTURE) as $vPicture)
	<li>
		<a class="fancybox" href="{{ url('images/'. UPLOAD_FOLDER_PICTURE . '/' . $vPicture->product_id . '/' . $vPicture->image_url) }}" data-fancybox-group="gallery" title="">
			<img src="{{ url('images/'. UPLOAD_FOLDER_PICTURE . '/' . $vPicture->product_id . '/' . $vPicture->image_url) }}" alt="" />
		</a>
	</li>
	@endforeach
</ul>