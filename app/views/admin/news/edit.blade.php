@extends('admin.layout.default')

@section('title')
{{ $title='Cập nhật tin' }}
@stop

@section('content')

@include('admin.news.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsController@update', $boxVi->id), 'method' => 'PUT', 'files' => true)) }}
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
								<label for="name">Tên Vietnamese</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::text('name', $boxVi->name , textPlaceHolder('Tên') + ['required'=>'']) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Thể loại</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('type_new_id', CommonNews::getTypeNews(), $boxVi->type_new_id, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Mô tả ngắn</label>
								<div class="row">
									<div class="col-sm-6">	                  	
									   {{ Form::textarea('sapo', $boxVi->sapo, textPlaceHolder('Mô tả ngắn') + ['required'=>'']) }}
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
								<label>Upload ảnh đại diện</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::file('image_url') }}
										<br />
										<img src="{{ UPLOADIMG . '/AdminNew/' . $boxVi->id . '/' . $boxVi->image_url }}" width="100px" />
										<p>Kích thước: {{ IMAGE_WIDTH }}x{{ IMAGE_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Mức ưu tiên</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::text('weight_number', $boxVi->weight_number, textPlaceHolder('Mức ưu tiên')) }}
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

						    <!-- @include('admin.common.meta', ['modelName' => 'AdminNew', 'modelId' => $boxVi->id]) -->

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
									<label for="name">Mô tả ngắn {{ $value->language }}</label>
									<div class="row">
										<div class="col-sm-6">	                  	
										   {{ Form::textarea($value->language.'_'.'sapo', $value->sapo, textPlaceHolder('Mô tả ngắn') + ['required'=>'']) }}
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
