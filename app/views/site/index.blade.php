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
			<div class="medium-4 columns">
				<div class="homebox-item">
					<strong>Bộ sưu tập mới</strong>
					<a href="#" title="">
						<img src="{{ url('assets/imgs/image1.jpg') }}" alt="" />
					</a>
				</div>
			</div>
			<div class="medium-4 columns">
				<div class="homebox-item">
					<strong>Khuyến mại</strong>
					<a href="#" title="">
						<img src="{{ url('assets/imgs/image1.jpg') }}" alt="" />
					</a>
				</div>
			</div>
			<div class="medium-4 columns">
				<div class="homebox-item">
					<strong>Tin tức</strong>
					<a href="#" title="">
						<img src="{{ url('assets/imgs/image1.jpg') }}" alt="" />
					</a>
				</div>
			</div>
		</div>
	</div>

	@include('site.common.partner')
	@include('site.common.script')

@stop
