@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới Video' }}
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminVideoController@store'))) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name', null , textPlaceHolder('Tên') + ['required'=>'']) }}
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
				@endforeach
				<div class="form-group">
					<label>Đường dẫn video youtube</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('link', '' , textPlaceHolder('Đường dẫn') + ['required'=>'']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Box Video</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('type', BoxVideo::where('language', VI)->lists("name", "id"), '', array('class' => 'form-control')) }}
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
	</div>
</div>
@stop
