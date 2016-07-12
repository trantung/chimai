@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý liên hệ' }}
@stop

@section('content')


 @if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a onclick="deleteSelected();" class="btn btn-danger">Xóa mục đã chọn</a>
	</div>
</div>
@endif 
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
			<h3 class="box-title">Quản lý liên hệ</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
				@if(Admin::isAdmin())
					<th><input type="checkbox" id="checkall" onClick="toggle(this)" /></th>
				@endif
				<th>Tên</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Địa chỉ</th>
				<th>Tin nhắn</th>
				<th>File đính kèm</th>
				<th>Ngày tạo</th>
				<th style="width:100px;">Action</th>
			</tr>
			 @foreach($data as $value)
			<tr>
				@if(Admin::isAdmin())
					<td><input type="checkbox" class="id"  name="id[]" value="{{ $value->id }}" /></td>
				@endif
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->phone }}</td>
				<td>{{ $value->address }}</td>
				<td>{{ nl2br($value->message) }}</td>
				<td><a href="<?php echo SITE_UPLOAD_FILE.'/'.$value->id.'/'.$value->file_upload; ?>">{{ $value->file_upload }}</a></td>
				<td>{{ $value->created_at }}</td>
				<td>
					{{ Form::open(array('method'=>'DELETE', 'action' => array('AdminContactController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
						<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
					{{ Form::close() }}
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
		{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>
@include('admin.contact.scriptindex')
@stop

