@extends('admin.layout.default')

@section('title')
	{{ $title = 'Thêm mới đơn hàng' }}
@stop

@section('content')

@include('admin.order.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('OrderController@store'), 'files'=> true)) }}
				<div class="box-body">
					<div class="form-group">
						<label for="email">Khách hàng</label>
						<div class="row">
							<div class="col-sm-6">
							   {{ Form::text('email', null , textPlaceHolder('Email') + ['required'=>'']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="code">Mã sản phẩm</label>
						<div class="row">
							<div class="col-sm-6">	                  	
							   {{ Form::text('code', null , textPlaceHolder('Mã sản phẩm') + ['required'=>'']) }}
							</div>
							<div class="col-sm-3">
								<a class="btn btn-primary" onclick="orderAddProduct()">Thêm</a>
							   	<span id="load_msg"></span>
							</div>
						</div>
					</div>
					<!-- start ordertable -->
					{{ Form::hidden('orderId') }}
					<div id="orderListProduct">

					</div>
					<!-- end ordertable -->
					<div class="form-group">
						<label>Hình thức thanh toán</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('payment', CommonCart::getPaymentList(), '', array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('status', CommonCart::getStatusOrderList(), '', array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Tin nhắn</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('message', '', array('class' => 'form-control', 'id' => 'message', 'rows' => 3, 'cols' => 5, 'maxlength' => 256)) }}
							</div>
						</div>
					</div>

				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		  	<!-- /.box -->
	  	</div>
	</div>
</div>

@include('admin.order.script')

@stop
