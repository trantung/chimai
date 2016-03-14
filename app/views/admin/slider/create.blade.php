@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới Slide' }}
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
			{{ Form::open(array('action' => array('AdminSlideController@store'), 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Type</label>
					<div class="row">
						<div class="col-sm-6">
						   {{ Form::select('type', [SLIDE_BANNER_VALUE => SLIDE_BANNER, SLIDE_PARTNER_VALUE => SLIDE_PARTNER], null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('name', null , textPlaceHolder('Name')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Link</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('link', null , textPlaceHolder('Đường dẫn')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Image</label>
					<p>Kích thước: {{ SLIDE_BANNER }}: {{ IMAGE_SLIDE_WIDTH }}x{{ IMAGE_SLIDE_HEIGHT }} / {{ SLIDE_PARTNER }}: {{ IMAGE_PARTNER_WIDTH }}x{{ IMAGE_PARTNER_HEIGHT }} / Dung lượng < 1Mb</p>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('image_url', array('required' => '')) }}
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
