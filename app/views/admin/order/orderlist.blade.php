@if(count($products) > 0)
	<style>
		.orderProductTableCenter {
			text-align: center;
		}
		.orderProductTableRight {
			text-align: right;
		}
		.orderProductTable {
			border: 1px solid #ccc;
			margin-top: 15px;
			margin-bottom: 15px;
		}
		.orderProductTable td,
		.orderProductTable th {
			border: 1px solid #ccc;
			padding: 5px;
		}
		.removeOrderProduct {
			color: #E00;
		    text-align: center;
		    cursor: pointer;
		    font-size: 18px;
		}
		.removeOrderProduct:hover,
		.removeOrderProduct:focus {
			color: #E00;
		}
	</style>
	<table width="100%" cellpadding="5px" class="orderProductTable">
		<thead>
			<tr>
				<th width="50"></th>
				<th>{{ trans('captions.product') }}</th>
				<th width="120" class="orderProductTableCenter">{{ trans('captions.color') }}</th>
				<th width="120" class="orderProductTableCenter">{{ trans('captions.size') }}</th>
				<th width="120" class="orderProductTableCenter">{{ trans('captions.surface') }}</th>
				<th width="50" class="orderProductTableCenter">{{ trans('captions.unit') }}</th>
				<th width="100" class="orderProductTableCenter">{{ trans('captions.unit_price') }}</th>
				<th width="100" class="orderProductTableCenter">{{ trans('captions.quanty') }}</th>
				<th width="100" class="orderProductTableCenter">{{ trans('captions.to_price') }}</th>
				<th width="70">Xóa</th>
			</tr>
		</thead>
		<tbody>
			<!-- START LIST PRODUCT -->
			@foreach($products as $key => $value)
				<tr>
					<td>
						<img width="50px" src="{{ url(CommonSlug::getImageUrlNotBox('Product', Product::find($value->product_id))) }}"/>
						{{ Form::hidden('product_id[]', $value->product_id) }}
					</td>
					<td>{{ Common::getFieldByModel('Product', $value->product_id, 'name') }}</td>
					<td class="orderProductTableCenter">{{ Form::select('color_id[]', CommonCart::getColorByProductId($value->product_id), $value->color_id, array('class' => 'form-control')) }}</td>
					<td class="orderProductTableCenter">{{ Form::select('size_id[]', CommonCart::getSizeByProductId($value->product_id), $value->size_id, array('class' => 'form-control')) }}</td>
					<td class="orderProductTableCenter">{{ Form::select('surface_id[]', CommonCart::getSurfaceByProductId($value->product_id), $value->surface_id, array('class' => 'form-control')) }}</td>
					<td class="orderProductTableCenter">{{ Common::getFieldByModel('AdminUnit', Product::find($value->product_id)->unit_id, 'name') }}</td>
					<td class="orderProductTableRight">{{ getFullPriceInVnd($value->price) }}</td>
					<td class="orderProductTableCenter">
						{{ Form::text('qty[]', $value->qty, array('class' => 'form-control orderProductTableCenter')) }}
					</td>
					<td class="orderProductTableRight">{{ Form::text('amount[]', $value->amount, array('class' => 'form-control orderProductTableRight')) }}</td>
					<td class="orderProductTableCenter">
						<a class="removeOrderProduct" onclick="removeOrderProduct('{{ $value->product_id }}')"><i class="fa fa-times-circle-o"></i></a>
					</td>
				</tr>
			@endforeach
			<!-- END LIST PRODUCT -->
			<tr>
				<td colspan="7" class="orderProductTableRight">{{ trans('captions.plus') }}</td>
				<td></td>
				<td class="orderProductTableRight">{{ Form::text('discount', CommonCart::getTotalAmount($order->id), array('class' => 'form-control orderProductTableRight')) }}</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="7" class="orderProductTableRight">{{ trans('captions.discount') }} (%)</td>
				<td class="orderProductTableCenter">{{ Form::text('discount', CommonCart::getDiscountByUserRole(User::find($order->user_id)), array('class' => 'form-control orderProductTableCenter')) }}</td>
				<td class="orderProductTableRight">{{ Form::text('discount', $order->discount, array('class' => 'form-control orderProductTableRight')) }}</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="7" class="orderProductTableRight">{{ trans('captions.to_price') }}</td>
				<td></td>
				<td class="orderProductTableRight">{{ Form::text('discount', $order->total, array('class' => 'form-control orderProductTableRight')) }}</td>
				<td></td>
			</tr>
			<!-- <tr>
				<td colspan="7">Số điểm tích lũy lần này</td>
				<td></td>
				<td colspan="2">8</td>
			</tr> -->
			<!-- <tr>
				<td colspan="7">Số điểm tích lũy cộng dồn</td>
				<td></td>
				<td colspan="2">18</td>
			</tr> -->
			<tr>
				<td colspan="10" class="orderProductTableRight">
					<a class="btn btn-primary" title="" onclick="updateOrderProduct()">Cập nhật</a>
				</td>
			</tr>
		</tbody>
	</table>
@endif