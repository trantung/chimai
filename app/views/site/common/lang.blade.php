<?php $arrayLang = Common::getArrayLang(); ?>

@foreach($arrayLang as $key => $value)
	<li>
		<a rel="alternate" href="{{ CommonSite::getUrlByLang($value) }}" class="custom-block-lang">{{ $value }}</a>
	</li>
@endforeach