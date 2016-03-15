@extends('admin.layout.default')

@section('title')
{{ $title='Chỉnh sửa box Product' }}
@stop

@section('content')

@include('admin.box.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('BoxProductController@update', $boxVi->id) , 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_menu', $boxVi->name_menu , textPlaceHolder('Tên') + ['required'=>'']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên content Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_content', $boxVi->name_content , textPlaceHolder('')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tên footer Vietnamese</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name_footer', $boxVi->name_footer , textPlaceHolder('')) }}
						</div>
					</div>
				</div>

				@foreach($boxEn as $value)
					<div class="form-group">
						<label for="name">Tên {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name_menu', $value->name_menu, textPlaceHolder('') + ['required'=>'']) }}
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
					<div class="form-group">
						<label for="name">Tên name_footer {{ $value->language }}</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text($value->language.'_'.'name_footer', $value->name_footer, textPlaceHolder('')) }}
							</div>
						</div>
					</div>
				@endforeach
				<div class="form-group">
					<label>Upload ảnh</label>
					{{ Form::file('image_url') }}
					<img class="image_boxProduct" src="{{ url(UPLOADIMG . '/BoxProduct/' . $boxVi->id . '/' . $boxVi->image_url) }}" />
				</div>

				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Menu</a></li>
						<li><a href="#tab_2" data-toggle="tab">Content</a></li>
						<li><a href="#tab_3" data-toggle="tab">Footer</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="form-group">
								<label>Mức ưu tiên</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::text('weight_number[]', Common::getValueCommonBox($boxVi->id, 'BoxProduct', MENU, 'weight_number'), textPlaceHolder('Mức ưu tiên')) }}
									</div>
								</div>
							</div>
							{{ Form::hidden('position[]', MENU) }}
							<div class="form-group">
								<label>Trạng thái</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('status[]', Common::getStatus(), Common::getValueCommonBox($boxVi->id, 'BoxProduct', MENU, 'status'), array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_2">
							<div class="form-group">
								<label>Mức ưu tiên</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::text('weight_number[]', Common::getValueCommonBox($boxVi->id, 'BoxProduct', CONTENT, 'weight_number'), textPlaceHolder('Mức ưu tiên')) }}
									</div>
								</div>
							</div>
							{{ Form::hidden('position[]', CONTENT) }}
							<div class="form-group">
								<label>Trạng thái</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('status[]', Common::getStatus(),  Common::getValueCommonBox($boxVi->id, 'BoxProduct', CONTENT, 'status'), array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_3">
							<div class="form-group">
								<label>Mức ưu tiên</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::text('weight_number[]', Common::getValueCommonBox($boxVi->id, 'BoxProduct', FOOTER, 'weight_number'), textPlaceHolder('Mức ưu tiên')) }}
									</div>
								</div>
							</div>
							{{ Form::hidden('position[]', FOOTER) }}
							<div class="form-group">
								<label>Trạng thái</label>
								<div class="row">
									<div class="col-sm-6">
										{{ Form::select('status[]', Common::getStatus(),  Common::getValueCommonBox($boxVi->id, 'BoxProduct', FOOTER, 'status'), array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
              	
			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>
@stop
