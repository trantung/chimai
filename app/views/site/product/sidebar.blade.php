<div class="side">
	<h3>{{ trans('captions.category') }}</h3>
	<ul>
		@foreach(Category::where('language', getLanguage())->get() as $cate )
			<li><input type="checkbox" value="{{ $cate->id }}" /> {{ $cate->name }}</li>
		@endforeach

	</ul>
</div>
<div class="side">
	<h3>{{ trans('captions.surface') }}</h3>
	<ul>
		@foreach(Surface::where('language', getLanguage())->get() as $surface )
			<li><input type="checkbox" value="{{ $surface->id }}" /> {{ $surface->name }}</li>
		@endforeach
	</ul>
</div>
<div class="side">
	<h3>{{ trans('captions.material') }}</h3>
	<ul>
		@foreach(Material::where('language', getLanguage())->get() as $material )
			<li><input type="checkbox" value="{{ $material->id }}" /> {{ $material->name }}</li>
		@endforeach
	</ul>
</div>
<div class="side">
	<h3>{{ trans('captions.size') }}</h3>
	<ul>
		@foreach(Size::where('language', getLanguage())->get() as $size )
			<li><input type="checkbox" value="{{ $size->id }}" /> {{ $size->name }}</li>
		@endforeach
	</ul>
</div>
<div class="side-submit">
	<button class="button" title="Tìm kiếm" type="submit">{{ trans('captions.search') }}</button>
</div>