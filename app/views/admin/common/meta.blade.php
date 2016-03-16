<?php 
	if(isset($modelName) && isset($modelId)) {
		$inputSeo = AdminSeo::where('model_name', $modelName)->where('model_id', $modelId)->first();
	}
 ?>
<h3>SEO META</h3>
@if(isset($inputSeo))
	{{-- meta input for edit form --}}
	<div class="form-group">
		<label for="title_site">Thẻ title</label>
		{{ Form::text('title_site', $inputSeo->title_site, textPlaceHolder('Thẻ title', true)) }}
	</div>
	<div class="form-group">
		<label for="description_site">Thẻ Descript site</label>
		{{ Form::textarea('description_site', $inputSeo->description_site, textPlaceHolder('Thẻ Descript site', true)) }}
	</div>
	<div class="form-group">
		<label for="keyword_site">Thẻ Keyword</label>
		{{ Form::text('keyword_site', $inputSeo->keyword_site, textPlaceHolder('Thẻ Keyword', true)) }}
	</div>
@else
	{{-- meta input for create form --}}
	<div class="form-group">
		<label for="title_site">Thẻ title</label>
		{{ Form::text('title_site','',textPlaceHolder('Thẻ title')) }}
	</div>
	<div class="form-group">
		<label for="description_site">Thẻ Descript site</label>
		{{ Form::textarea('description_site', '' , textPlaceHolder('Thẻ Descript site')) }}
	</div>
	<div class="form-group">
		<label for="keyword_site">Thẻ Keyword</label>
		{{ Form::text('keyword_site', '' , textPlaceHolder('Thẻ Keyword')) }}
	</div>
@endif
