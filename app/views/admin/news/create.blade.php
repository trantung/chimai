@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới tin' }}
@stop

@section('content')

@include('admin.news.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsController@store'), 'files'=> true)) }}
				<div class="box-body">
					<div class="form-group">
						<label for="name">Tên Vietnamese</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text('name', null , textPlaceHolder('Tên') + ['required'=>'']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thể loại</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('type_new_id', CommonNews::getTypeNews(), '', array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Mô tả ngắn</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::textarea('sapo', null, textPlaceHolder('Mô tả ngắn') + ['required'=>'']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Nội dung</label>
						<div class="row">
							<div class="col-sm-12">	                  	
							   {{ Form::textarea('description', null, array('class' => 'form-control', "rows" => 6, 'id' => 'editor1', 'required' => true)) }}
							</div>
						</div>
					</div>

					@foreach($arrayLang as $keyLang => $singLang)
						<div class="form-group">
							<label for="name">Tên {{ $singLang }}</label>
							<div class="row">
								<div class="col-sm-6">	                  	
								   {{ Form::text($singLang.'_'.'name', null , textPlaceHolder('') + ['required'=>'']) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name">Mô tả ngắn {{ $singLang }}</label>
							<div class="row">
								<div class="col-sm-6">	                  	
								   {{ Form::textarea($singLang.'_'.'sapo', null, textPlaceHolder('Mô tả ngắn') + ['required'=>'']) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name">Nội dung {{ $singLang }}</label>
							<div class="row">
								<div class="col-sm-12">	                  	
								{{ Form::textarea($singLang.'_'.'description', null, array('class' => 'form-control', "rows" => 6, 'id' => 'editor2', 'required' => true)) }}
								</div>
							</div>
						</div>
					@endforeach

					<div class="form-group">
						<label>Upload ảnh đại diện</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('image_url', array('required' => '')) }}
								<p>Kích thước: {{ IMAGE_WIDTH }}x{{ IMAGE_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
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

					@include('admin.common.meta')
					
					<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
					</div>
				</div>
			{{ Form::close() }}
		  	<!-- /.box -->
	  	</div>
	</div>
</div>

@include('admin.common.ckeditor')

@stop
