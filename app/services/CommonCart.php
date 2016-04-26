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


}
