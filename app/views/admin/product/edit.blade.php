@extends('admin.layout.default')

@section('title')
{{ $title='Sửa sản phẩm' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminProductController@update', $boxVi->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_vi" data-toggle="tab">VI</a></li>
						@foreach($arrayLang as $keyLang => $singLang)
						<li><a href="#tab_{{ $singLang }}" data-toggle="tab">{{ $singLang }}</a></li>
						@endforeach
						<li><a href="#tab_1" data-toggle="tab">Màu sắc</a></li>
						<li><a href="#tab_2" data-toggle="tab">Hình ảnh phối cảnh</a></li>

					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_vi">
							<div class="form-group">
								<label for="name">Tên Vietnamese</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('name', $boxVi->name , textPlaceHolder('Tên') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Mã sản phẩm</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('code', $boxVi->code , textPlaceHolder('Mã sản phẩm') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Số lượng</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('qty', $boxVi->qty , textPlaceHolder('Số lượng') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Upload ảnh đại diện</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::file('image_url') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('price', $boxVi->price , textPlaceHolder('Giá') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá cũ</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('price_old', $boxVi->price_old , textPlaceHolder('Giá cũ')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Thông tin</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::textarea('description', $boxVi->description , textPlaceHolder('Thông tin')) }}
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label>Mức ưu tiên</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::text('weight_number', $boxVi->weight_number , textPlaceHolder('Mức ưu tiên')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Trạng thái</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('status', Common::getStatus(), $boxVi->status, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Đơn vị</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('unit_id', Common::getUnit(), $boxVi->unit_id, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Xuất xứ</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('origin_id', Common::getOrigin(), $boxVi->origin_id, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Bề mặt</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('surface_id', Common::getSurface(), $boxVi->surface_id, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Chất liệu</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('material_id', Common::getMaterial(), $boxVi->material_id, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Category</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('category_id[]', Common::getCategory(), '', array('class' => 'form-control', 'multiple' => true)) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Kích cỡ</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('size_id[]', Common::getSize(), '', array('class' => 'form-control', 'multiple' => true)) }}
									</div>
								</div>
							</div>
							
						</div>
						@foreach($boxEn as $value)
						<div class="tab-pane" id="tab_{{ $singLang }}">
							<div class="form-group">
								<label for="name">Tên {{ $value->language }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text($value->language.'_'.'name', $value->name , textPlaceHolder('') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá {{ $value->language }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text($value->language.'_'.'price', $value->price , textPlaceHolder('') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá cũ {{ $value->language }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text($value->language.'_'.'price_old', $value->price_old , textPlaceHolder('')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Thông tin {{ $value->language }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::textarea($value->language.'_'.'description', $value->description , textPlaceHolder('')) }}
									</div>
								</div>
							</div>

						</div>
						<!-- /.tab-pane -->
						@endforeach

						<div class="tab-pane" id="tab_1">
							<input type="file" name="file_upload" id="file_upload" />
			                <input id="process_url" name="process_url" type="hidden" value="{{ url('admin/product/color_upload_image') }}" />
			                <p>Kích thước: {{ IMAGE_PRODUCT_WIDTH }}x{{ IMAGE_PRODUCT_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
			                <div id="box_images">
			                    <ul>
			                        @if(isset($images))
			                            {{ $images }}
			                        @endif
			                    </ul>
			                </div>

						</div>
						<div class="tab-pane" id="tab_2">
							sadf 2
						</div>
					</div>
					<!-- /.tab-content -->
				</div>
              	<div class="clearfix"></div>
			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>

@include('admin.product.uploadify')

@stop
