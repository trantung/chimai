<div class="margin-bottom">
	{{ Form::open(array('action' => 'NewsController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tiêu đề</label>
		  	<input type="text" name="title" class="form-control" placeholder="Tiêu đề" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại</label>
			 {{  Form::select('type_new_id', [], null, array('class' => 'form-control' )) }}
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>