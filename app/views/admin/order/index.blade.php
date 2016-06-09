@extends('admin.layout.default')

@section('title')
	{{ $title='Quản lý đơn hàng' }}
@stop

@section('content')

@include('admin.order.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('OrderController@create') }}" class="btn btn-primary">Thêm</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	    <div class="box">
			<div class="box-header">
			    <h3 class="box-title">Danh sách đơn hàng (Total: {{ $data->getTotal() }})</h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Mã ĐH</th>
						<th>Email KH</th>
						<th>Tiền chiết khấu</th>
						<th>Tổng tiền</th>
						<th>Hình thức thanh toán</th>
						<th>Trạng thái</th>
						<th style="width:200px;">Action</th>
					</tr>
					@foreach($data as $value)
						<tr>
							<td>{{ $value->id }}</td>
							<td>{{ $value->code }}</td>
							<td>{{ Common::getFieldByModel('User', $value->user_id, 'email') }}</td>
							<td>{{ getFullPriceInVnd($value->discount) }}</td>
							<td>{{ getFullPriceInVnd($value->total) }}</td>
							<td>{{ CommonCart::getPaymentValue($value->payment) }}</td>
							<td>{{ CommonCart::getStatusOrderValue($value->status) }}</td>
							<td>
								<a href="{{ action('OrderController@exportExcelOrderList', $value->id) }}" class="btn btn-success">Excel</a>
								<a href="{{ action('OrderController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
								{{ Form::open(array('method'=>'DELETE', 'action' => array('OrderController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</table>
			</div>
	    </div>
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

