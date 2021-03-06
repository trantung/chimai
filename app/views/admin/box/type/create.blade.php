@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới box tin' }}
@stop

@section('content')

@include('admin.box.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('BoxTypeController@store'), 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên menu Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_menu', null , textPlaceHolder('Tên thể loại tin')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên content Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_content', null , textPlaceHolder('Tên thể loại tin')) }}
						</div>
					</div>
				</div>
				@foreach($arrayLang as $keyLang => $singLang)
					<div class="form-group">
						<label for="name">Tên menu {{ $singLang }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($singLang.'_'.'name_menu', null , textPlaceHolder('Name')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Tên content {{ $singLang }} </label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($singLang.'_'.'name_content', null , textPlaceHolder('Name')) }}
							</div>
						</div>
					</div>
				@endforeach
				<div class="form-group">
					<label>Upload ảnh</label>
					{{ Form::file('image_url') }}
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
	                <label>Vị trí</label>
	                <div class="row">
						<div class="col-sm-6">
		                	{{ Form::select('position', Common::getPosition(), '', array('class' => 'form-control')) }}
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
              	
			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>
@stop
