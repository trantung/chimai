@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới thể loại tin' }}
@stop

@section('content')

@include('admin.typenew.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsTypeController@update', $inputTypeNew->id) , 'method' => 'PUT')) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên thể loại</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::text('name', $inputTypeNew->name , textParentCategory('Tên thể loại tin')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Mức ưu tiên</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('weight_number', $inputTypeNew->weight_number , textParentCategory('Mức ưu tiên')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
	                <label>Trạng thái</label>
	               	<div class="row">
						<div class="col-sm-6">
	                		{{ Form::select('status', selectStatusGame(), $inputTypeNew->status, array('class' => 'form-control')) }}
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
