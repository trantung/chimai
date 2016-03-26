@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.news'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.news'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container news">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<div class="news-inner">
					@foreach($data as $new)
					<div class="row">
						<div class="medium-3 columns">
							<img src="{{ url(CommonSlug::getImageUrlNotBox('AdminNew', $new)) }}" />
						</div>
						<div class="medium-9 columns">
							<h4><a href="{{ action('SiteNewsController@detail') }}">test</a></h4>
							{{ CommonSlug::getSlugByModel($new, 'AdminNew')->sapo }}
						</div>
					</div>	
					@endforeach
					<div class="row">
						<div class="medium-3 columns">
							<img src="{{ url('assets/imgs/a1.jpg') }}" />
						</div>
						<div class="medium-9 columns">
							<h4><a href="{{ action('SiteNewsController@detail') }}">Lorem ipsum dolor sit amet conse ctetur adipisicing elit</a></h4>
							<p>
								 Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
							</p>
						</div>
					</div>

				</div>
			</div>
			<div class="medium-3 medium-pull-9 columns">
				@include('site.news.sidebar')
			</div>
		</div>
	</div>

@stop
