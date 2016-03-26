<?php $arrayLang = Common::getArrayLangNotVi(); ?>
<li>
	<a rel="alternate" href="{{ CommonSite::getUrlByLang(VI) }}" class="custom-block-lang">{{ VI }}</a>
</li>
@foreach($arrayLang as $key => $value)
	<li>
		<a rel="alternate" href="{{ CommonSite::getUrlByLang($value) }}" class="custom-block-lang">{{ $value }}</a>
	</li>
@endforeach