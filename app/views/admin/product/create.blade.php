@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới file PDF' }}
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminPdfController@store'), 'files' => true)) }}
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
					<label>Upload file PDF</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('filePdf') }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Upload ảnh</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('image_url') }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Box Pdf</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('type', BoxPdf::where('language', VI)->lists("name", "id"), '', array('class' => 'form-control')) }}
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
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop
