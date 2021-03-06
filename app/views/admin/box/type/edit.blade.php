@extends('admin.layout.default')

@section('title')
{{ $title='Chỉnh sửa box tin' }}
@stop

@section('content')

@include('admin.box.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('BoxTypeController@update', $boxVi->id) , 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên menu Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_menu', $boxVi->name_menu , textPlaceHolder('Tên thể loại tin')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên content Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_content', $boxVi->name_content , textPlaceHolder('Tên thể loại tin')) }}
						</div>
					</div>
				</div>
				@foreach($boxEn as $value)
					<div class="form-group">
						<label for="name">Tên menu {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name_menu', $value->name_menu, textPlaceHolder('')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Tên name_content {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name_content', $value->name_content, textPlaceHolder('')) }}
							</div>
						</div>
					</div>
				@endforeach
				<div class="form-group">
					<label>Upload ảnh</label>
					{{ Form::file('image_url') }}
					<img class="image_boxtype" src="{{ url(UPLOADIMG . '/BoxType/' . $boxVi->id . '/' . $boxVi->image_url) }}" />
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
	                <label>Vị trí</label>
	                <div class="row">
						<div class="col-sm-6">
		                	{{ Form::select('position', Common::getPosition(), $boxVi->position, array('class' => 'form-control')) }}
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
              	
			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>
@stop
