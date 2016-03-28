@extends('admin.layout.default')

@section('title')
{{ $title='Chỉnh sửa video' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminVideoController@index') }} " class="btn btn-success">Danh sách video</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminVideoController@update', $boxVi->id) , 'method' => 'PUT')) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name', $boxVi->name , textPlaceHolder('Tên') + ['required'=>'']) }}
						</div>
					</div>
				</div>
				@foreach($boxEn as $value)
					<div class="form-group">
						<label for="name">Tên {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name', $value->name, textPlaceHolder('Name') + ['required'=>'']) }}
							</div>
						</div>
					</div>
				@endforeach
				<div class="form-group">
					<label>Đường dẫn video youtube</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('link', $boxVi->link , textPlaceHolder('Đường dẫn') + ['required'=>'']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Box Video</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('type', BoxVideo::where('language', VI)->lists("name", "id"), $boxVi->type, array('class' => 'form-control')) }}
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

				@include('admin.common.meta', ['modelName' => 'AdminVideo', 'modelId' => $boxVi->id])

			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>
@stop
