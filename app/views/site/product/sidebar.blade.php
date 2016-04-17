{{ Form::open(array('action' => ['SiteIndexController@filter', CommonSlug::getSlugSearch()], 'method'=>'GET', 'class' => 'form-search', 'id' => 'filter')) }}
<div class="side">
	<h3>{{ trans('captions.category') }}</h3>
	<ul>
		@foreach(Common::getModelPropertyByLang('Category', $lang) as $cate )
			<li>
				{{ Form::checkbox('category[]', $cate->id ) }}
				{{ $cate->name }}
			</li>
		@endforeach

	</ul>
</div>
<div class="side">
	<h3>{{ trans('captions.material') }}</h3>
	<ul>
		@foreach(Common::getModelPropertyByLang('Material', $lang) as $material )
			<li>{{ Form::checkbox('material[]', $material->id ) }} {{ $material->name }}</li>
		@endforeach
	</ul>
</div>
<div class="side">
	<h3>{{ trans('captions.surface') }}</h3>
	<ul>
		@foreach(Common::getModelPropertyByLang('Surface', $lang) as $surface )
			<li>{{ Form::checkbox('surface[]', $surface->id ) }} {{ $surface->name }}</li>
		@endforeach
	</ul>
</div>
<div class="side">
	<h3>{{ trans('captions.size') }}</h3>
	<ul>
		@foreach(Common::getModelPropertyByLang('Size', $lang) as $size )
			<li>{{ Form::checkbox('size[]', $size->id ) }} {{ $size->name }}</li>
		@endforeach
	</ul>
</div>

<div class="side-submit">
	<button class="button" title="Tìm kiếm" type="submit">{{ trans('captions.search') }}</button>
</div>
{{ Form::close() }}