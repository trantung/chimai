@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới thể loại tin' }}
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
					<label for="name">Tên thể loại</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name', null , textPlaceHolder('Tên thể loại tin') + ['required' => '']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Giới thiệu</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::textarea('sapo', null, array('placeholder' => 'Giới thiệu', 'maxlength' => 500, 'class' => 'textarea form-control', 'rows' => '6', 'required' => '')) }}
						</div>
					</div>
				</div>
				@foreach($arrayLang as $keyLang => $singLang)
					<div class="form-group">
						<label for="name">Tên thể loại {{ $singLang }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($singLang.'_'.'name', null , textPlaceHolder('Tên thể loại tin') + ['required' => '']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Giới thiệu {{ $singLang }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::textarea($singLang.'_'.'sapo', null, array('placeholder' => 'Giới thiệu', 'maxlength' => 500, 'class' => 'textarea form-control', 'rows' => '6', 'required' => '')) }}
							</div>
						</div>
					</div>
				@endforeach
					<div class="form-group">
						<label>Upload ảnh</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('image_url') }}
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
          		</div>
			  	
			  	@include('admin.common.meta')

				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>
@stop
