@extends('admin.layout.default')

@section('title')
	{{ $title='Excel cho đơn hàng '.$order->code }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('OrderController@exportExcelOrder', $order->id) }}" class="btn btn-primary">Xuất file excel</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	    <div class="box">
			<div class="box-header">
			    <h3 class="box-title">{{ $title }}</h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>File</th>
						<th style="width:200px;">Action</th>
					</tr>
					@foreach($orderExcel as $value)
						<?php $linkdownload = '/excels/'.$value->order_id.'/'.$value->file; ?>
						<tr>
							<td>{{ $value->file }}</td>
							<td>
								<a href="{{ $linkdownload }}" class="btn btn-success">Download</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
	    </div>
	</div>
</div>

@stop

