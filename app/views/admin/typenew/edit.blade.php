@extends('admin.layout.default')

@section('title')
{{ $title='Sửa tin' }}
@stop

@section('content')

@include('admin.typenew.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsTypeController@update', $boxVi->id), 'method' => 'PUT', 'files' => true)) }}
				<div class="box-body">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_vi" data-toggle="tab">VI</a></li>
							@foreach($arrayLang as $keyLang => $singLang)
							<li><a href="#tab_{{ $singLang }}" data-toggle="tab">{{ $singLang }}</a></li>
							@endforeach
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_vi">
								<div class="form-group">
									<label for="name">Tiêu đề</label>
									<div class="row">
										<div class="col-sm-6">	                  	
										   {{ Form::text('name', $boxVi->name , textPlaceHolder('Tiêu đề') + ['required' => '']) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Upload ảnh</label>
									<div class="row">
										<div class="col-sm-6">
											{{ Form::file('image_url') }}
											<img src="{{ url(UPLOADIMG . '/TypeNew/' . $boxVi->id . '/' . $boxVi->image_url) }}" width="200px" height="auto"  />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Box tin tức</label>
									<div class="row">
										<div class="col-sm-6">
											{{ Form::select('box_type_id', Common::getBoxType(), $boxVi->box_type_id, array('class' => 'form-control')) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="name">Mô tả ngắn</label>
									<div class="row">
										<div class="col-sm-6">	                  	
										   {{ Form::textarea('sapo', $boxVi->sapo, array('placeholder' => 'Mô tả ngắn', 'maxlength' => 500, 'class' => 'form-control', 'rows' => '6', 'required' => '')) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="name">Nội dung</label>
									<div class="row">
										<div class="col-sm-12">	                  	
										   {{ Form::textarea('description', $boxVi->description, array('class' => 'form-control', "rows" => 6, 'id' => 'editor1', 'required' => true)) }}
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
				              	@include('admin.common.meta', ['modelName' => 'TypeNew', 'modelId' => $boxVi->id])
							</div>
							@foreach($boxEn as $value)
								<div class="tab-pane" id="tab_{{ $singLang }}">
									<div class="form-group">
										<label for="name">Tiêu đề {{ $value->language }}</label>
										<div class="row">
											<div class="col-sm-6">	                  	
											   {{ Form::text($value->language.'_'.'name', $value->name , textPlaceHolder('Tiêu đề') + ['required' => '']) }}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="name">Mô tả ngắn {{ $value->language }}</label>
										<div class="row">
											<div class="col-sm-6">	                  	
											   {{ Form::textarea($value->language.'_'.'sapo', $value->sapo, array('placeholder' => 'Mô tả ngắn', 'maxlength' => 500, 'class' => 'form-control', 'rows' => '6', 'required' => '')) }}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="name">Nội dung {{ $value->language }}</label>
										<div class="row">
											<div class="col-sm-12">	                  	
											{{ Form::textarea($value->language.'_'.'description', $value->description, array('class' => 'form-control', "rows" => 6, 'id' => 'editor2', 'required' => true)) }}
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>
@include('admin.common.ckeditor')
@stop
