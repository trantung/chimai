@extends('admin.layout.default')

@section('title')
{{ $title='Sửa User' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('UserController@index') }} " class="btn btn-success">Danh sách user khách hàng</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('UserController@update', $user->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label for="email">Tên đầy đủ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('fullname', $user->fullname, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Phone</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('phone', $user->phone, array('class' => 'form-control')) }}
							</div>
						</div>
					</div><div class="form-group">
						<label for="email">Địa chỉ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('address', $user->address, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::text('email', $user->email, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Loại tài khoản</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('type', [1 => trans('captions.personal'), 2 => trans('captions.company')], $user->type, array('class' =>'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Quyền hạn</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('role_user_id', RoleUser::lists('name', 'id'), $user->role_user_id, array('class' =>'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Trạng thái</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('status', selectActive(), $user->status, array('class' =>'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<input type="submit" class="btn btn-primary" value="Lưu lại" />
				</div>
				
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
