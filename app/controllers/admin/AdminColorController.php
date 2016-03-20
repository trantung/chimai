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
						'weight_number' => 0
					]);
			} else {
				echo 'Invalid file type.';
			}
		}
	}

	public function colorGetImage()
	{
		$id = Input::get('product_id');
		return CommonProduct::getProductBoxImages($id, PRODUCT_COLOR, 'color_box_images');
	}

	public function colorDeleteImage()
	{
		$id = Input::get('id');
		ProductImage::find($id)->delete();
		return CommonProduct::getProductBoxImages($id, PRODUCT_COLOR, 'color_box_images');
	}

	public function colorUpdateText()
	{
		$id = Input::get('id');
		$name = Input::get('name');
		$weight_number = Input::get('weight_number');
		ProductImage::find($id)->update([
				'name' => $name,
				'weight_number' => $weight_number
			]);
		return CommonProduct::getProductBoxImages($id, PRODUCT_COLOR, 'color_box_images');
	}

}

