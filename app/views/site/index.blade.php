@extends('site.layout.default', array('seoMeta' => CommonSeo::getMetaSeo(SEO_DEFAULT)))

@section('title')
	@if($seoMeta = CommonSeo::getMetaSeo(SEO_DEFAULT))
		{{ $title = $seoMeta->title_site }}
	@else
		{{ $title = trans('captions.home') }}
	@endif
@stop

@section('content')
	@include('site.common.slide')

	<div class="homebox">
		<div class="row">
			@foreach($content as $value)
				@if($value->model_name == 'BoxType')
					<div class="medium-4 columns">
						<div class="homebox-item">
							<strong>{{ CommonSlug::getSlugByLanguage($value, 'BoxType')->name_content }}</strong>
							<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxType')->slug) }}" title="">
								<img src="{{ url(CommonSlug::getImageUrlByModel('BoxType', $value)) }}" alt="" />
							</a>
						</div>
					</div>
				@endif
				@if($value->model_name == 'BoxProduct')
					<div class="medium-4 columns">
						<div class="homebox-item">
							<strong>{{ CommonSlug::getSlugByLanguage($value, 'BoxProduct')->name_content }}</strong>
							<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxProduct')->slug) }}" title="">
								<img src="{{ url(CommonSlug::getImageUrlByModel('BoxProduct', $value)) }}" alt="" />
							</a>
						</div>
					</div>
				@endif
				@if($value->model_name == 'BoxCollection')
					<div class="medium-4 columns">
						<div class="homebox-item">
							<strong>{{ CommonSlug::getSlugByLanguage($value, 'BoxCollection')->name_content }}</strong>
							<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxCollection')->slug) }}" title="">
								<img src="{{ url(CommonSlug::getImageUrlByModel('BoxCollection', $value)) }}" alt="" />
							</a>
						</div>
					</div>
				@endif
				@if($value->model_name == 'BoxPromotion')
					<div class="medium-4 columns">
						<div class="homebox-item">
							<strong>{{ CommonSlug::getSlugByLanguage($value, 'BoxPromotion')->name_content }}</strong>
							<a href="{{ action('SiteIndexController@slug', CommonSlug::getSlugByLanguage($value, 'BoxPromotion')->slug) }}" title="">
								<img src="{{ url(CommonSlug::getImageUrlByModel('BoxPromotion', $value)) }}" alt="" />
							</a>
						</div>
					</div>
				@endif
			@endforeach
			
		</div>
	</div>

	@include('site.common.partner')
	@include('site.common.script')

@stop
