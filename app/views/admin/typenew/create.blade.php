@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới tin' }}
@stop

@section('content')

@include('admin.typenew.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsTypeController@store'), 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tiêu đề</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name', null , textPlaceHolder('Tiêu đề') + ['required' => '']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Upload ảnh</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('image_url') }}
							<p>Kích thước: {{ IMAGE_WIDTH }}x{{ IMAGE_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Box tin tức</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('box_type_id', Common::getBoxType(), '', array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Mô tả ngắn</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::textarea('sapo', null, array('placeholder' => 'Mô tả ngắn', 'maxlength' => 500, 'class' => 'form-control', 'rows' => '6', 'required' => '')) }}
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
							   {{ Form::text($singLang.'_'.'name', null , textPlaceHolder('Tên tin') + ['required' => '']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Mô tả ngắn {{ $singLang }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::textarea($singLang.'_'.'sapo', null, array('placeholder' => 'Mô tả ngắn', 'maxlength' => 500, 'class' => 'form-control', 'rows' => '6', 'required' => '')) }}
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
						<label>Mức ưu tiên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('weight_number', null , textPlaceHolder('Mức ưu tiên')) }}
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
