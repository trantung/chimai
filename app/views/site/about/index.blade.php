@extends('site.layout.default')

@section('title')
	{{ $title = trans('captions.aboutus'); }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => trans('captions.aboutus'), 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container about">
		<div class="row">
			<div class="column">
				<h4><a href="{{ action('SiteNewsController@index') }}">Giới thiệu về công ty</a></h4>
				<p>
					 Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
				</p>
			</div>
		</div>
		<div class="row">
			<div class="medium-3 columns">
				<img src="{{ url('assets/imgs/a1.jpg') }}" />
			</div>
			<div class="medium-9 columns">
				<h4><a href="{{ action('SiteNewsController@index') }}">Tầm nhìn</a></h4>
				<p>
					 Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
				</p>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<h4><a href="{{ action('SiteNewsController@index') }}">Sứ mệnh</a></h4>
				<p>
					 Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
				</p>
			</div>
		</div>
		<div class="row">
			<div class="medium-3 columns">
				<img src="{{ url('assets/imgs/a1.jpg') }}" />
			</div>
			<div class="medium-9 columns">
				<h4><a href="{{ action('SiteNewsController@index') }}">Cam kết</a></h4>
				<p>
					 Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
				</p>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<h4><a href="{{ action('SiteNewsController@index') }}">Đối tác chiến lược</a></h4>
				<p>
					 Ait amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesentto dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. 
				</p>
			</div>
		</div>
	</div>

@stop
