<?php
class CommonProduct {

	public static function getProductBoxImages($productId, $type, $boxView)
	{
		$images = ProductImage::where('type', $type)
							->where('product_id', $productId)
							->orderByRaw(DB::raw("weight_number = '0', weight_number"))
							->get();
		return View::make('admin.product.'.$boxView)->with(compact('images'));
	}

}