<?php
class AdminColorController extends AdminController {

	public function colorUploadImage()
	{
		$verifyToken = md5(UNIQUE_SALT . $_POST['timestamp']);
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$fileTypes = array('jpg','jpeg','gif','png');
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (in_array($fileParts['extension'], $fileTypes)) {
				$imageUrl = CommonImage::uploadImageFile('1', UPLOADIMG, 1, 'test', IMAGE_PRODUCT_WIDTH, IMAGE_PRODUCT_HEIGHT, IMAGE_MODE_FIT);
				ProductImage::create(['image_url' => $imageUrl, 'weight_number' => 0]);
			} else {
				echo 'Invalid file type.';
			}
		}
	}

	public function colorGetImage()
	{
		$images = ProductImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		return View::make('admin.product.box_images')->with(compact('images'));
	}

	public function colorDeleteImage()
	{
		$id = Input::get('id');
		ProductImage::find($id)->delete();
		$images = ProductImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		return View::make('admin.product.box_images')->with(compact('images'));	
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
		$images = ProductImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		return View::make('admin.product.box_images')->with(compact('images'));	
	}

}

