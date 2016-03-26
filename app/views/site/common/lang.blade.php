<?php $arrayLang = Common::getArrayLangNotVi(); ?>
@foreach($arrayLang as $key => $value)
	<li>
		<a rel="alternate" hreflang="{{ $value }}" href="{{ CommonSite::getUrlByLang($value) }}" class="custom-block-lang">{{ $value }}</a>
	</li>
@endforeach