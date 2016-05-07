<div class="margin-bottom">
	{{ Form::open(array('action' => 'NewsTypeController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại</label>
			 {{ Form::select('box_type_id', ['' => 'Tất cả'] + Common::getBoxType(), null, array('class' => 'form-control' )) }}
		</div>

		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	{{ Form::close() }}
</div>