<?php
class CommonImage {

	/**
	* uploadImage Upload image
	* upload image and resize / fit image with background color (default: white (255, 255, 255))
	**/

	public static function uploadImage($id, $path, $imageUrl, $folder, $w = IMAGE_WIDTH, $h = IMAGE_HEIGHT, $currentImage = NULL)
	{
		$destinationPath = public_path().'/'.$path.'/'.$folder.'/'.$id.'/';
		if(Input::hasFile($imageUrl)){
			$file = Input::file($imageUrl);
			$filename = $file->getClientOriginalName();

			$mode = 'fit';
			
			// Source image
			$size = getimagesize($file);
			switch ($size['mime']) {
			    case "image/gif":
			        $src = imagecreatefromgif($file);
			        break;
			    case "image/jpeg":
			        $src = imagecreatefromjpeg($file);
			        break;
			    case "image/png":
			        $src = imagecreatefrompng($file);
			        break;
			    case "image/bmp":
			        $src = imagecreatefromwbmp($file);
			        break;
			}
			
			// Destination image with white background
			$dst = imagecreatetruecolor($w, $h);
			imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
			
			// All Magic is here
			self::scale_image($src, $dst, $mode);
			
			// Output to the browser
			// Header('Content-Type: image/jpeg');
			imagejpeg($dst, $destinationPath . $filename);

			// $uploadSuccess = $file->move($destinationPath, imagejpeg($dst));
			return $filename;
		}
		if ($currentImage) {
			return $currentImage;
		}
	}

	public static function scale_image($src_image, $dst_image, $op = 'fit') {
	    $src_width = imagesx($src_image);
	    $src_height = imagesy($src_image);
	 
	    $dst_width = imagesx($dst_image);
	    $dst_height = imagesy($dst_image);
	 
	    // Try to match destination image by width
	    $new_width = $dst_width;
	    $new_height = round($new_width*($src_height/$src_width));
	    $new_x = 0;
	    $new_y = round(($dst_height-$new_height)/2);
	 
	    // FILL and FIT mode are mutually exclusive
	    if ($op =='fill')
	        $next = $new_height < $dst_height;
	     else
	        $next = $new_height > $dst_height;
	 
	    // If match by width failed and destination image does not fit, try by height 
	    if ($next) {
	        $new_height = $dst_height;
	        $new_width = round($new_height*($src_width/$src_height));
	        $new_x = round(($dst_width - $new_width)/2);
	        $new_y = 0;
	    }
	 
	    // Copy image on right place
	    imagecopyresampled($dst_image, $src_image , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
	}

}