<?php
class AdminPictureController extends AdminController {

	public function pictureUploadImage()
	{
		$productId = $_POST['product_id'];
		$verifyToken = md5(UNIQUE_SALT . $_POST['timestamp']);
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$fileTypes = array('jpg','jpeg','gif','png');
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (in_array($fileParts['extension'], $fileTypes)) {
				$imageUrl = CommonImage::uploadImageFile($productId, UPLOADIMG, 1, UPLOAD_FOLDER_PICTURE, IMAGE_PRODUCT_PICTURE_WIDTH, IMAGE_PRODUCT_PICTURE_HEIGHT, IMAGE_MODE_FIT);
				ProductImage::create([
						'product_id' => $productId,
						'image_url' => $imageUrl,
						'type' => PRODUCT_PICTURE,
						'weight_number' => 0
					]);
			} else {
				echo 'Invalid file type.';
			}
		}
	}

	public function pictureGetImage()
	{
		$productId = Input::get('product_id');
		return CommonProduct::getProductBoxImages($productId, PRODUCT_PICTURE, 'picture_box_images');
	}

	public function pictureDeleteImage()
	{
		$id = Input::get('id');
		$productId = Input::get('product_id');
		ProductImage::find($id)->delete();
		return CommonProduct::getProductBoxImages($productId, PRODUCT_PICTURE, 'picture_box_images');
	}

	public function pictureUpdateText()
	{
		$id = Input::get('id');
		$name = Input::get('name');
		$weight_number = Input::get('weight_number');
		$productId = Input::get('product_id');
		ProductImage::find($id)->update([
				'name' => $name,
				'weight_number' => $weight_number
			]);
		return CommonProduct::getProductBoxImages($productId, PRODUCT_PICTURE, 'picture_box_images');
	}

}

