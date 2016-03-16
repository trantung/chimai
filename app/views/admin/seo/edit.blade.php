@extends('admin.layout.default')

@section('title')
{{ $title='Sửa Seo mặc định' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('SeoController@updateSeo'), 'method' => 'PUT')) }}
				<div class="box-body">
					@include('admin.common.meta', $inputSeo)
					<div class="form-group">
					  	<label for="name">Script Header</label>
					  	<div class="row">
							<div class="col-sm-12">
							   {{ Form::textarea('header_script', $inputSeo->header_script , textPlaceHolder('')) }}
							</div>
					    </div>
					</div>
					<div class="form-group">
					  	<label for="name">Script Footer</label>
					  	<div class="row">
							<div class="col-sm-12">
							   {{ Form::textarea('footer_script', $inputSeo->footer_script , textPlaceHolder('')) }}
							</div>
					  </div>
					</div>
				</div>
			  	<!-- /.box-body -->
			    <div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
	    </div>
		<!-- /.box -->
	</div>
</div>
@stop
