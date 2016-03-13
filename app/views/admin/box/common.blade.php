<div class="row margin-bottom">
	<div class="col-xs-12">
		@if(Request::segment(3) == 'type')
			<a href="{{ action('BoxTypeController@index') }} " class="btn btn-success">Danh sách Box tin</a>
		@endif
		@if(Request::segment(3) == 'collection')
			<a href="{{ action('BoxCollectionController@index') }} " class="btn btn-success">Danh sách Box sưu tập</a>
		@endif
		@if(Request::segment(3) == 'product')
			<a href="{{ action('BoxProductController@index') }} " class="btn btn-success">Danh sách Box sản phẩm</a>
		@endif
	</div>
</div>