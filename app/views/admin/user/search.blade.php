<div class="margin-bottom">
	{{ Form::open(array('action' => 'UserController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên</label>
			{{ Form::text('keyword', null, array('class' => 'form-control')) }}
		</div>
		 <div class="input-group" style="width: 150px; display:inline-block;">
			<label>Số điện thoại</label>
			{{ Form::text('phone', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Loại user</label>
			{{ Form::select('role_user_id', ['' => 'Lựa chọn'] + RoleUser::lists('name', 'id'), null, array('class' =>'form-control')) }}
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	{{ Form::close() }}
</div>