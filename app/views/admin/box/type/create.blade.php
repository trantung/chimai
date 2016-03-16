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
					<label for="name">Tên Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_menu', null , textPlaceHolder('Tên') + ['required'=>'']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên content Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_content', null , textPlaceHolder('')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên footer Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_footer', null , textPlaceHolder('')) }}
						</div>
					</div>
				</div>
				@foreach($arrayLang as $keyLang => $singLang)
					<div class="form-group">
						<label for="name">Tên {{ $singLang }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($singLang.'_'.'name_menu', null , textPlaceHolder('') + ['required'=>'']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Tên content {{ $singLang }} </label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($singLang.'_'.'name_content', null , textPlaceHolder('')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Tên footer {{ $singLang }} </label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($singLang.'_'.'name_footer', null , textPlaceHolder('')) }}
							</div>
						</div>
					</div>
				@endforeach
				<div class="form-group">
					<label>Upload ảnh</label>
					{{ Form::file('image_url') }}
				</div>

				@include('admin.box.tab')

				@include('admin.common.meta')
		  
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop
