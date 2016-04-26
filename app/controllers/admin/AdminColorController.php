<?php
class AdminColorController extends AdminController {

	public function colorUploadImage()
	{
		$productId = $_POST['product_id'];
		$verifyToken = md5(UNIQUE_SALT . $_POST['timestamp']);
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$fileTypes = array('jpg','jpeg','gif','png');
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (in_array($fileParts['extension'], $fileTypes)) {
				$imageUrl = CommonImage::uploadImageFile($productId, UPLOADIMG, 1, UPLOAD_FOLDER_COLOR, IMAGE_PRODUCT_COLOR_WIDTH, IMAGE_PRODUCT_COLOR_HEIGHT, IMAGE_MODE_FIT);
				ProductImage::create([
						'product_id' => $productId,
						'image_url' => $imageUrl,
						'type' => PRODUCT_COLOR,
						'qty' => 0,
						'qty_temp' => 0,
						'weight_number' => 0,
					]);
			} else {
				echo 'Invalid file type.';
			}
		}
	}

	public function colorGetImage()
	{
		$productId = Input::get('product_id');
		return CommonProduct::getProductBoxImages($productId, PRODUCT_COLOR, 'color_box_images');
	}

	public function colorDeleteImage()
	{
		$id = Input::get('id');
		$productId = Input::get('product_id');
		ProductImage::find($id)->delete();
		return CommonProduct::getProductBoxImages($productId, PRODUCT_COLOR, 'color_box_images');
	}

	public function colorUpdateText()
	{
		$id = Input::get('id');
		$name = Input::get('name');
		$qty = Input::get('qty');
		$productId = Input::get('product_id');
		ProductImage::find($id)->update([
				'name' => $name,
				'qty' => $qty,
				'qty_temp' => $qty,
			]);
		return CommonProduct::getProductBoxImages($productId, PRODUCT_COLOR, 'color_box_images');
	}

}

