@extends('admin.layout.default')

@section('title')
{{ $title='Sửa chiết khấu' }}
@stop

@section('content')

@include('admin.discount.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('DiscountController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label for="name">Mức chiết khấu</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text('value', $data->value , textPlaceHolder('Mức chiết khấu') + ['required' => '']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Cấp độ khách hàng</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('role_user_id', UserManager::getRoleUserArray(), $data->role_user_id, array('class' => 'form-control')) }}
							</div>
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
