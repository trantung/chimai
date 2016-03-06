@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.news'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.news'), 'link' => action('SiteNewsController@index')],
			['name' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit', 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container news">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<div class="news-inner detail">
					<h1>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</h1>
					<div class="summary">
						Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
					</div>
					<div class="desc">
						<p>Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. </p>
						<p>Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. </p>
						<p>Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. </p>
						<p>Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. </p>
						<p>Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. </p>
					</div>
				</div>
			</div>
			<div class="medium-3 medium-pull-9 columns">
				@include('site.news.sidebar')
			</div>
		</div>
	</div>

@stop
