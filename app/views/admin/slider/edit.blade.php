@extends('admin.layout.default')

@section('title')
{{ $title='Sửa slide' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminSlideController@index') }} " class="btn btn-success">Danh sách slide</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('AdminSlideController@update', $boxVi->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Type</label>
					<div class="row">
						<div class="col-sm-6">
						   {{ Form::select('type', [SLIDE_BANNER_VALUE => SLIDE_BANNER, SLIDE_PARTNER_VALUE => SLIDE_PARTNER], $boxVi->type, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('name', $boxVi->name , textPlaceHolder('Name')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Link Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('link', $boxVi->link , textPlaceHolder('Đường dẫn')) }}
						</div>
					</div>
				</div>
				@foreach($boxEn as $value)
					<div class="form-group">
						<label for="name">Tên {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name', $value->name , textPlaceHolder('')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Link {{ $value->language }} </label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'link', $value->link , textPlaceHolder('')) }}
							</div>
						</div>
					</div>
				@endforeach
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="name">Upload ảnh</label>
							<p>Kích thước: {{ SLIDE_BANNER }}: {{ IMAGE_SLIDE_WIDTH }}x{{ IMAGE_SLIDE_HEIGHT }} / {{ SLIDE_PARTNER }}: {{ IMAGE_PARTNER_WIDTH }}x{{ IMAGE_PARTNER_HEIGHT }} / Dung lượng < 1Mb</p>
							{{ Form::file('image_url') }}
							<img src="{{ url(UPLOADIMG . '/AdminSlide/' . $boxVi->id . '/' . $boxVi->image_url) }}" width="200px" height="auto"  />
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

				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		  </div>
		  <!-- /.box -->
	</div>
</div>
@stop
