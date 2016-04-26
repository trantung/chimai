<html>
	<head>
		<title>In danh sách sản phẩm</title>
		<meta charset="utf-8">
		<style>
			body {
				margin: 0;
				padding: 0;
			}
			p {
				margin-top: 6px;
				margin-bottom: 6px;
			}
			body, td, th, strong, p {
				font-size: 14px;
			}
		</style>
	</head>
	<body>
		<div style="width: 890px; margin: 0 auto; padding-bottom: 30px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="5" style="border-bottom: 1px solid #ccc; border-collapse:collapse;">
				<tr>
					<td width="30%"><img src="{{ url('assets/imgs/logo.png') }}" alt="" /></td>
					<td width="70%" style="text-align: right;">
						<h2 style="color: #ED1C24; font-size: 18px; text-transform: uppercase; margin-bottom: 5px; margin-top: 5px;">{{ COMPANY_NAME }}</h2>
						<p><strong>{{ trans('captions.address') }}:</strong> {{ CommonConfig::getCode(CONTACT_ADDRESS) }}</p>
						<p><strong>{{ trans('captions.phone') }}:</strong> {{ CommonConfig::getCode(CONTACT_PHONE) }}</p>
						<!-- <p><strong>{{-- trans('captions.email') --}}:</strong> {{-- CommonConfig::getCode(CONTACT_EMAIL) --}}</p> -->
					</td>
				</tr>
			</table>
			<h1 style="font-size: 24px; font-weight: bold; text-align: center; text-transform: uppercase;">Báo giá</h1>
			<p style="font-style: italic;">{{ show_date_vn() }}</p>
			<table width="100%" border="1" cellspacing="0" cellpadding="5" style="border: 1px solid #ccc; border-collapse:collapse;">
				<tbody>
					<tr>
						<td width="120"><strong>{{ trans('captions.fullname') }}</strong></td>
						<td></td>
					</tr>
					<tr>
						<td width="120"><strong>{{ trans('captions.email') }}</strong></td>
						<td></td>
					</tr>
					<tr>
						<td width="120"><strong>{{ trans('captions.phone') }}</strong></td>
						<td></td>
					</tr>
					<tr>
						<td width="120"><strong>{{ trans('captions.address') }}</strong></td>
						<td></td>
					</tr>
					
				</tbody>
			</table>
			<p style="margin-top: 20px; margin-bottom: 20px; clear: both;">Xin trân trọng gửi tới Quý khách hàng bảng báo giá tốt nhất như sau:</p>
			@if(Cart::count() > 0)
				<table width="100%" border="1" cellspacing="0" cellpadding="5" style="border: 1px solid #ccc; border-collapse:collapse;">
					<thead style="background: #CCFFCC;">
						<tr>
							<th width="50"></th>
							<th width="150">{{ trans('captions.product') }}</th>
							<th width="120">{{ trans('captions.color') }}</th>
							<th width="120">{{ trans('captions.size') }}</th>
							<th width="120">{{ trans('captions.surface') }}</th>
							<th width="50">{{ trans('captions.unit') }}</th>
							<th width="100">{{ trans('captions.unit_price') }}</th>
							<th width="80">{{ trans('captions.quanty') }}</th>
							<th width="100">{{ trans('captions.to_price') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $key => $value)
							<tr>
								<td style="text-align: center;"><img src="{{ $value->options->image_url }}" width="50px" /></td>
								<td>{{ $value->name }}</td>
								<td style="text-align: center;">{{ Common::getFieldByModel('ProductImage', $value->options->color_id, 'name') }}</td>
								<td style="text-align: center;">{{ Common::getFieldByModel('Size', $value->options->size_id, 'name') }}</td>
								<td style="text-align: center;">{{ Common::getFieldByModel('Surface', $value->options->surface_id, 'name') }}</td>
								<td style="text-align: center;">{{ $value->options->unit }}</td>
								<td style="text-align: right;">{{ getFullPriceInVnd($value->price) }}</td>
								<td style="text-align: center;">{{ $value->qty }}</td>
								<td style="text-align: right;"></td>
							</tr>
						@endforeach
						<!-- END LIST PRODUCT -->
						<tr>
							<td colspan="7" style="text-align: right;">{{ trans('captions.plus') }} (Đơn vị tính: VNĐ):</td>
							<td></td>
							<td colspan="2" style="text-align: right;"></td>
						</tr>
						@if(CommonSite::isLogin())
							<tr>
								<td colspan="7" style="text-align: right;">{{ trans('captions.discount') }}</td>
								<td style="text-align: center;"></td>
								<td colspan="2" style="text-align: right;"></td>
							</tr>
							<tr>
								<td colspan="7" style="text-align: right;">{{ trans('captions.to_price') }}</td>
								<td></td>
								<td colspan="2" style="text-align: right;"></td>
							</tr>
						@endif
					</tbody>
				</table>
			@endif
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<h3>Ghi chú:</h3>
				<p>- Báo giá trên có giá trị trong vòng 05 ngày, giá có thể thay đổi tuỳ theo thị trường mà không kịp thông báo.</p>
				<p>- Trong khu vực các quận nội, ngoại thành TP.Hà Nội, Chúng tôi sẽ giao hàng, lắp đặt và hướng dẫn tại nhà miễn phí.</p>
				<p>- Hàng sẽ được giao trong vòng 24h sau khi nhận được đơn đặt hàng đối với đơn hàng có sẵn.</p>
				<p>- Thanh toán bằng Tiền mặt, hoặc Chuyển khoản</p>
			</div>
			<div style="margin-top: 10px; margin-bottom: 10px;">
				<h3>Thông tin tài khoản:</h3>
				<p>Chủ TK: NGUYEN VAN A</p>
				<p>Số TK: 0123456789</p>
				<p>Chi nhánh: Trần Duy Hưng - Hà Nội</p>
			</div>
			<table width="100%" border="0">
				<tr>
					<td width="50%"></td>
					<td width="50%" style="text-align: center;">
						<p style="font-weight: bold;">Xin cảm ơn sự quan tâm của Quý khách hàng</p>
						<p style="font-weight: bold;">Làm hài lòng Quý khách là Mục tiêu của chúng tôi!</p>
					</td>
				</tr>
			</div>
		</div>
	</body>
</html>