@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý khách hàng' }}
@stop

@section('content')

@include('admin.user.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('UserController@create') }}" class="btn btn-primary">Thêm</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách khách hàng</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>email</th>
			  <th>Tên</th>
			  <th>Cấp độ</th>
			  <th>Phone</th>
			  <th>Trạng thái</th>
			  <th>Action</th>
			</tr>
			@foreach($inputUser as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->email }}</td>
			  <td>{{ $value->fullname }}</td>
			  <td>{{ Common::getFieldByModel('RoleUser', $value->role_user_id, 'name') }}</td>
			  <td>{{ $value->phone }}</td>
			  <td>{{ UserManager::getStatus($value->status) }}</td>
			  <td>
					<a href="{{action('UserController@edit', $value->id) }}" class="btn btn-primary">Edit</a>
				  	@if($value->status == ACTIVE )
					<a href="{{action('UserController@changeStatusUser', $value->id) }}" class="btn btn-danger">Chặn</a>
					@else
					<a href="{{action('UserController@changeStatusUser', $value->id) }}" class="btn btn-primary">Kích hoạt</a>
					@endif
					@if(UserManager::getUsername($value->id)['type_user'] == TYPESYSTEM)
						<a href="{{action('UserController@changePassword', $value->id) }}" class="btn btn-primary">Đổi mật khẩu</a>
					@endif
			  </td>
			  </td>
			</tr>
			@endforeach
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		{{ $inputUser->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

