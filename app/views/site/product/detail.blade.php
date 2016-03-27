@extends('site.layout.default')

@section('title')
	{{ $title = $data->name }}
@stop

@section('content')

	<?php
		$breadcrumb = array(
			['name' => $origin->name, 'link' => CommonSlug::getUrlSlug($origin->slug)],
			['name' => $data->name, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="main_container">
		<div class="row">
			<div class="medium-9 medium-push-3 columns">
				<div class="detail_top">
					<div class="row">
						<div class="medium-6 columns">
							@include('site.product.detail_images')
						</div>
						<div class="medium-6 columns">
							@include('site.product.detail_info')
						</div>
					</div>
				</div>
				<div class="detail_bottom">
					<div class="tab_bar1">
						<ul class="tabs tabs1" data-tab>
							<li class="tab-title active"><a href="#panel1">Hình ảnh phối cảnh</a></li>
							<!-- <li class="tab-title"><a href="#panel2">Video</a></li> -->
							<li class="tab-title"><a href="#panel3">Sản phẩm cùng loại</a></li>
							<li class="tab-title"><a href="#panel4">Gửi yêu cầu</a></li>
						</ul>
						<div class="tabs-content">
							<div class="content active" id="panel1">
								<div class="detail-content">
									@include('site.product.detail_gallery')
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="content" id="panel3">
								<div class="detail-content">
									<!--product list-->
									@include('site.product.detail_related')
									<!-- products end-->
								</div>
							</div>
							<div class="content" id="panel4">
								<div class="detail-content">
									@include('site.product.detail_send_require')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- sidebar -->
			<div class="medium-3 medium-pull-9 columns">
				@include('site.product.sidebar')
			</div>
		</div>
	</div>

	@include('site.product.script')

@stop
