@extends('admin.layout.default')

@section('title')
{{ $title='Chỉnh sửa box Showroom' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('BoxShowRoomController@update', $boxVi->id) , 'method' => 'PUT', 'files' => true)) }}
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
							   {{ Form::text($value->language.'_'.'name', $value->name, textPlaceHolder('') + ['required'=>'']) }}
							</div>
						</div>
					</div>
				@endforeach

				<div class="form-group">
					<label>Upload ảnh</label>
					{{ Form::file('image_url') }}
					<img class="image_boxProduct" src="{{ url(UPLOADIMG . '/BoxShowroom/' . $boxVi->id . '/' . $boxVi->image_url) }}" />
					<p>Kích thước: {{ IMAGE_WIDTH }}x{{ IMAGE_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
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
					<label>Bộ sưu tập</label>
					<div class="row">
						<div class="col-sm-6">
						{{ Form::select('box_collection_id[]', Common::getCollection('CollectionBoxShowroom', 'box_show_room_id'), Common::getCollection('CollectionBoxShowroom', 'box_show_room_id', $boxVi->id), array('class' => 'form-control', 'multiple' => true)) }}
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

				@include('admin.common.meta', ['modelName' => 'BoxShowRoom', 'modelId' => $boxVi->id])
              	
			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>
@stop
