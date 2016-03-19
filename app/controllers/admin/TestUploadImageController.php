<?php

class TestUploadImageController extends AdminController {

	public function index()
	{
		$images = TestImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		$images = View::make('admin.test_upload_image.box_images')->with(compact('images'));
		return View::make('admin.test_upload_image.index')->with(compact('images'));
	}

	public function testUploadImage()
	{
		$verifyToken = md5(UNIQUE_SALT . $_POST['timestamp']);
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$fileTypes = array('jpg','jpeg','gif','png');
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (in_array($fileParts['extension'], $fileTypes)) {
				$imageUrl = CommonImage::uploadImageFile('1', UPLOADIMG, 1, 'test', IMAGE_PRODUCT_WIDTH, IMAGE_PRODUCT_HEIGHT, IMAGE_MODE_FIT);
				TestImage::create(['image_url' => $imageUrl, 'weight_number' => 0]);
			} else {
				echo 'Invalid file type.';
			}
		}
	}

	public function testGetImage()
	{
		$images = TestImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		return View::make('admin.test_upload_image.box_images')->with(compact('images'));
	}

	public function testDeleteImage()
	{
		$id = Input::get('id');
		TestImage::find($id)->delete();
		$images = TestImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		return View::make('admin.test_upload_image.box_images')->with(compact('images'));	
	}

	public function testUpdateText()
	{
		$id = Input::get('id');
		$name = Input::get('name');
		$weight_number = Input::get('weight_number');
		TestImage::find($id)->update([
				'name' => $name,
				'weight_number' => $weight_number
			]);
		$images = TestImage::orderByRaw(DB::raw("weight_number = '0', weight_number"))->get();
		return View::make('admin.test_upload_image.box_images')->with(compact('images'));	
	}

}
