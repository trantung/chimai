@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý Menu' }}
@stop

@section('content')

@include('admin.script.index')
<!-- inclue Search form 
-->
@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a onclick="updateIndexData();" class="btn btn-success">Cập nhật</a>
	</div>
</div>
@endif
<div class="row">
	<div class="col-xs-12">
	  	<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			    <table class="table table-hover">
					<tr>
						@if(Admin::isAdmin())
						<th><input type="checkbox" id="checkall" onClick="toggle(this)" /></th>
						@endif
						<th>ID</th>
						<th>Tên</th>
						<th>Thể loại</th>
						<th>Mức ưu tiên</th>
						<th>Trạng thái</th>
						<th>Action</th>
					</tr>
					@foreach($boxs as $value)
					<tr>
						@if(Admin::isAdmin())
						<td><input type="checkbox" class="box_id" name="box_id[]" value="{{ $value->id }}" /></td>
						@endif
						<td>{{ $value->model_id }}</td>
						<td>{{ Common::getNameByBoxCommon($value) }} </td>
						<td>{{ Common::getBoxNameByBoxCommon($value) }}</td>
						@if(Admin::isAdmin())
							<td><input type="text" name="weight_number[]" value="{{ $value->weight_number }}" class="only_number" style="width: 50px; text-align: center;" /></td>
						@else
							<td> </td>
						@endif
						@if(Admin::isAdmin())
							<td>
								{{ Form::select('status[]', Common::getStatus(), Common::getValueCommonBox($value->model_id, $value->model_name, MENU, 'status'), array('class' => 'form-control')) }}
							</td>
						@else
							<td> </td>
						@endif
						<td>
						@if(Admin::isAdmin())
							<a href="{{ action('AdminMenuController@edit', $value->id) }}" class="btn btn-danger">Sửa tên</a>
						@endif
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
		{{-- $boxs->appends(Request::except('page'))->links() --}}
		</ul>
	</div>
</div>

@stop

