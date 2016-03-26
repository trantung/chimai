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
			{{ Form::open(array('action' => array('NewsTypeController@update', $boxVi->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên thể loại</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name', $boxVi->name , textPlaceHolder('Tên thể loại tin') + ['required' => '']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Giới thiệu</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::textarea('sapo', $boxVi->sapo, array('placeholder' => 'Giới thiệu', 'maxlength' => 500, 'class' => 'textarea form-control', 'rows' => '6', 'required' => '')) }}
						</div>
					</div>
				</div>
				@foreach($boxEn as $keyLang => $value)
					<div class="form-group">
						<label for="name">Tên thể loại {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name', $value->name , textPlaceHolder('Tên thể loại tin') + ['required' => '']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Giới thiệu {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::textarea($value->language.'_'.'sapo', $value->sapo, array('placeholder' => 'Giới thiệu', 'maxlength' => 500, 'class' => 'textarea form-control', 'rows' => '6', 'required' => '')) }}
							</div>
						</div>
					</div>
				@endforeach
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
