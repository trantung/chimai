<strong>1. Thông tin hoá đơn</strong><br/>
- Tổng tiền trước chiết khấu: {{ getFullPriceInVnd($order->total) }}
<br/>
- Tổng tiền chiết khấu: {{ getFullPriceInVnd($order->discount) }}
<br/>
- Tổng tiền thanh toán: {{ getFullPriceInVnd($order->total - $order->discount) }}
<br/>
- Mã số hoá đơn : {{ $order->code }}
<br/>
<strong>2. Chi tiết hoá đơn</strong>
@foreach($items as $item)
<div>
- Tên sản phẩm: {{ $item->name }}
<br/>
- Mã sản phẩm: {{ $item->options->code }}
<br/>
- Màu sắc: {{ Common::getFieldByModel('ProductImage', $item->options->color_id, 'name') }}
<br/>
- Kích cỡ: {{ Common::getFieldByModel('Size', $item->options->size_id, 'name') }}
<br/>
- Bề mặt: {{ Common::getFieldByModel('Surface', $item->options->surface_id, 'name') }}
<br/>
- Số lượng: {{ $item->qty }}
<br/>
- Giá sản phẩm: {{ getFullPriceInVnd($item->price) }}
<br/>
</div>
<hr />
@endforeach