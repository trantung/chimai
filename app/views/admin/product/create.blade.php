@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới sản phẩm' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminProductController@store'), 'files' => true)) }}
			<div class="box-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_vi" data-toggle="tab">VI</a></li>
						@foreach($arrayLang as $keyLang => $singLang)
						<li <?php echo ($keyLang == VI)?'class="active"':''; ?>><a href="#tab_{{ $singLang }}" data-toggle="tab">{{ $singLang }}</a></li>
						@endforeach
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_vi">
							<div class="form-group">
								<label for="name">Tên Vietnamese</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('name', null , textPlaceHolder('Tên') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Mã sản phẩm</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('code', null , textPlaceHolder('Mã sản phẩm') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Số lượng</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('qty', null , textPlaceHolder('Số lượng') + ['required'=>'']) }}
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
									   {{ Form::text('price', null , textPlaceHolder('Giá') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá cũ</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('price_old', null , textPlaceHolder('Giá cũ')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Thông tin</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::textarea('description', null, array('placeholder' => 'Thông tin', 'maxlength' => 500, 'class' => 'textarea form-control', 'rows' => '6')) }}
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label>Mức ưu tiên</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::text('weight_number', '' , textPlaceHolder('Mức ưu tiên')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Trạng thái</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('status', Common::getStatus(), '', array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Đơn vị</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('unit_id', Common::getUnit(), '', array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Xuất xứ</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('origin_id', Common::getOrigin(), '', array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Bề mặt</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('surface_id', Common::getSurface(), '', array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Chất liệu</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('material_id', Common::getMaterial(), '', array('class' => 'form-control')) }}
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

							@include('admin.common.meta')
							
						</div>
						@foreach($arrayLang as $keyLang => $singLang)
						<div class="tab-pane <?php echo ($keyLang == VI)?'active':''; ?>" id="tab_{{ $singLang }}">
							<div class="form-group">
								<label for="name">Tên {{ $singLang }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text($singLang.'_'.'name', null , textPlaceHolder('') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá {{ $singLang }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text($singLang.'_'.'price', null , textPlaceHolder('') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Giá cũ {{ $singLang }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text($singLang.'_'.'price_old', null , textPlaceHolder('')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Thông tin {{ $singLang }}</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::textarea($singLang.'_'.'description', null, array('maxlength' => 250, 'class' => 'textarea form-control', 'rows' => '6')) }}
									</div>
								</div>
							</div>

						</div>
						<!-- /.tab-pane -->
						@endforeach
					</div>
					<!-- /.tab-content -->
				</div>

			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>

@stop
