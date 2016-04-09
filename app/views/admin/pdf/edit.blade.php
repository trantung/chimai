@extends('admin.layout.default')

@section('title')
{{ $title='Chỉnh sửa file PDF' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminPdfController@index') }} " class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminPdfController@update', $boxVi->id) , 'method' => 'PUT', 'files' => true)) }}
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
					<label>Upload file PDF</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('filePdf') }}
							@if($boxVi->file)
								<strong>Download File</strong>
							@endif
							<a href="{{ url(UPLOADPDF.'/'.$boxVi->id.'/'.$boxVi->file) }}">{{ $boxVi->file }}</a>
							@if($boxVi->file)
								<br /><a href="{{ action('AdminPdfController@removeFile', $boxVi->id) }}">Xóa</a>
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Link download file PDF</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('link', $boxVi->link , textPlaceHolder('Link')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Upload ảnh</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('image_url') }}
							<img src="{{ url(UPLOADIMG . '/AdminPdf/' . $boxVi->id . '/' . $boxVi->image_url) }}" width="200px" height="auto"  />
							<p>Kích thước: {{ IMAGE_CATALOG_WIDTH }}x{{ IMAGE_CATALOG_HEIGHT }} / Dung lượng < 1Mb / Định dạng: jpg, jpeg, gif, png</p>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Box Pdf</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('type', BoxPdf::where('language', VI)->lists("name", "id"), $boxVi->type, array('class' => 'form-control')) }}
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

				@include('admin.common.meta', ['modelName' => 'AdminPdf', 'modelId' => $boxVi->id])

			 	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			 	</div>
		  	</div>
		{{ Form::close() }}
	</div>
</div>
@stop
