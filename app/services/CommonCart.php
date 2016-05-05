<?php
class CommonCart
{

	public static function getSizeByProductId($productId)
	{
		if($productId) {
			$array = array();
			$sizeProduct =  SizeProduct::where('product_id', $productId)
				->groupBy('size_id')->lists('size_id');
			if($sizeProduct) {
				foreach($sizeProduct as $value) {
					$array[$value] = Common::getFieldByModel('Size', $value, 'name');
				}
			}
			return $array;
		}
		return Size::where('language', getLanguage())->lists('name', 'id');
	}

	public static function getSurfaceByProductId($productId)
	{
		if($productId) {
			$array = array();
			$surfaceProduct =  SurfaceProduct::where('product_id', $productId)
				->groupBy('surface_id')->lists('surface_id');
			if($surfaceProduct) {
				foreach($surfaceProduct as $value) {
					$array[$value] = Common::getFieldByModel('Surface', $value, 'name');
				}
			}
			return $array;
		}
		return Surface::where('language', getLanguage())->lists('name', 'id');
	}

	public static function getColorByProductId($productId)
	{
		if($productId) {
			return ProductImage::where('product_id', $productId)
				->where('type', PRODUCT_COLOR)
				->distinct()
				->lists('name', 'id');
		}
		return [];
	}

	public static function getDiscountByUserRole($user)
	{
		$roleUser = $user->role_user_id;
		$discount = Discount::where('role_user_id', $roleUser)->first();
		if($discount) {
			return $discount->value;
		}
		return 0;
	}

	public static function getDiscountPrice($total, $discount)
	{
		return $total*$discount/100;
	}

	public static function getDiscountPriceTotal($total, $discount)
	{
		return $total - self::getDiscountPrice($total, $discount);
	}

	public static function getPaymentList()
	{
		return array(
				PAYMENT1 => trans('captions.payment_1'),
				PAYMENT2 => trans('captions.payment_2'),
				PAYMENT3 => trans('captions.payment_3'),
			);
	}

	public static function getPaymentValue($paymentId = PAYMENT1)
	{
		$array = self::getPaymentList();
		return $array[$paymentId];
	}

	public static function getStatusOrderList()
	{
		return array(
				ORDER_STATUS_1 => trans('label.order_status_1'),
				ORDER_STATUS_2 => trans('label.order_status_2'),
				ORDER_STATUS_3 => trans('label.order_status_3'),
				ORDER_STATUS_4 => trans('label.order_status_4'),
				ORDER_STATUS_5 => trans('label.order_status_5'),
			);
	}

	public static function getStatusOrderValue($status = ORDER_STATUS_1)
	{
		$array = self::getStatusOrderList();
		return $array[$status];
	}

	public static function getTotalAmount($orderId)
	{
		return OrderProduct::where('order_id', $orderId)->sum('amount');
	}

	public static function getDiscountIdByUserRole($user)
	{
		$roleUser = $user->role_user_id;
		$discount = Discount::where('role_user_id', $roleUser)->first();
		if($discount) {
			return $discount->id;
		}
		return 0;
	}

	public static function getDiscountArray()
	{

		$data = Discount::lists('value', 'id');
		if($data) {
			return $data;
		}
		return [];
	}

	public static function loadViewOrderListProduct($orderId)
	{
		$order = Order::find($orderId);
		$products = OrderProduct::where('order_id', $orderId)->get();
		return View::make('admin.order.orderlist')->with(compact('products', 'order'));
	}
	
}
