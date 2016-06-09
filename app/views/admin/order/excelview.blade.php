<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			
		</style>
	</head>
	<h1>Đơn hàng {{ $order->code }}</h1>
	<table>
		<tr>
			<td>
				Ngày tạo: {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}
			</td>
		</tr>
		<tr>
			<td>{{ trans('captions.fullname') }}: {{ User::find($order->user_id)->fullname }}</td>
		</tr>
		<tr>
			<td>{{ trans('captions.email') }}: {{ User::find($order->user_id)->email }}</td>
		</tr>
		<tr>
			<td>{{ trans('captions.phone') }}: {{ User::find($order->user_id)->phone }}</td>
		</tr>
		<tr>
			<td>{{ trans('captions.address') }}: {{ User::find($order->user_id)->address }}</td>
		</tr>
		<tr>
			<td>{{ trans('captions.payment') }}: {{ CommonCart::getPaymentValue($order->payment) }}</td>
		</tr>
		<tr>
			<td>{{ trans('captions.content') }}: {{ $order->content }}</td>
		</tr>

	</table>
	<table>
		<thead>
			<tr>
				<th>{{ trans('captions.product') }}</th>
				<th>{{ trans('captions.color') }}</th>
				<th>{{ trans('captions.size') }}</th>
				<th>{{ trans('captions.surface') }}</th>
				<th>{{ trans('captions.unit') }}</th>
				<th>{{ trans('captions.unit_price') }}</th>
				<th>{{ trans('captions.quanty') }}</th>
				<th>{{ trans('captions.to_price') }}</th>
			</tr>
		</thead>
		<tbody>
			@if($data)
				@foreach($data as $key => $value)
					<tr>
						<td>{{ Common::getFieldByModel('Product', $value->product_id, 'name') }}</td>
						<td>{{ Common::getFieldByModel('ProductImage', $value->color_id, 'name') }}</td>
						<td>{{ Common::getFieldByModel('Size', $value->size_id, 'name') }}</td>
						<td>{{ Common::getFieldByModel('Surface', $value->surface_id, 'name') }}</td>
						<td>{{ $value->unit }}</td>
						<td>{{ $value->price }}</td>
						<td>{{ $value->qty }}</td>
						<td>{{ $value->amount }}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="7" style="text-align: right;">{{ trans('captions.plus') }} (Đơn vị tính: VNĐ):</td>
					<td style="text-align: right;">{{ CommonCart::getTotalAmount($order->id) }}</td>
				</tr>
				<tr>
					<td colspan="7" style="text-align: right;">{{ trans('captions.discount') }} ({{ CommonCart::getDiscountByUserRole(User::find($order->user_id)) }}%)</td>
					<td style="text-align: right;">{{ $order->discount }}</td>
				</tr>
				<tr>
					<td colspan="7" style="text-align: right;">{{ trans('captions.to_price') }}</td>
					<td style="text-align: right;">{{ $order->total }}</td>
				</tr>
			@endif
		</tbody>
	</table>
    
</html>