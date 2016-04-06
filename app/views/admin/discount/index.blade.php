@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý mức chiết khấu' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('DiscountController@create') }}" class="btn btn-primary">Thêm mức chiết khấu</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách mức chiết khấu</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Mức chiết khấu</th>
						<th>Câp độ khách hàng</th>
						<th style="width:200px;">&nbsp;</th>
					</tr>
					@foreach($data as $value)
						<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->value }}</td>
						<td>{{ UserManager::getRoleUserName($value->role_user_id) }}</td>
						<td>
							<a href="{{ action('DiscountController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('DiscountController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
		{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop
