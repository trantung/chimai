@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
	<li>
		<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}" class="custom-block-lang">{{ $localeCode }}</a>
	</li>
@endforeach