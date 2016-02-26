<?php
class Common {
	public static function getNameBox($input)
	{
		if ($input) {
			if ($input->name_menu) {
				return $input->name_menu;
			}
			if ($input->name_content) {
				return $input->name_content;
			}
		}
		return null;
	}

	public static function getPositionName($input)
	{
		if ($input == 1) {
			return 'Menu';
		}
		if ($input == 2) {
			return 'Content';
		}
		return null;
	}
	public static function getPosition()
	{
		$position = array(MENU => 'Menu', CONTENT => 'Content');
		return $position;
	}
	public static function getStatus()
	{
		$array = [ACTIVE => 'Hiển thị', INACTIVE => 'Ẩn'];
		return $array;
	}

	public static function getInputLanguage($lang, $name)
	{
		if ($lang == VI) {
			return $name;
		}
		if ($lang == EN) {
			return 'en_'.$name ;
		}
		return null;
	}
	public static function getNameByPosition($input, $lang)
	{
		$output = array();
		if ($input['position'] == MENU) {
			$key = self::getInputLanguage($lang, 'name');
			$output['name_menu'] = $input[$key];
			$output['name_content'] = '';
			return $output;
		}
		if ($input['position'] = CONTENT) {
			$output['name_menu'] = '';
			$output['name_content'] = $input[$key];
			return $output;
		}
		return array('name_content' => '', 'name_menu' => '');
	}

	public static function createBox($input, $modelName, $lang)
	{
		$name = self::getNameByPosition($input, $lang);
		$vi['status'] = $input['status'];
		$vi['position'] = $input['position'];
		$vi['weight_number'] = $input['weight_number'];
		$vi['name_menu'] = $name['name_menu'];
		$vi['name_content'] = $name['name_content'];
		$id = $modelName::create($vi)->id;
		return $id;
	}

	public static function uploadImage($id, $path, $imageUrl, $folder, $imageSeo = NULL)
	{
		$destinationPath = public_path().'/'.$path.'/'.$folder.'/'.$id.'/';
		if(Input::hasFile($imageUrl)){
			$file = Input::file($imageUrl);
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
			return $filename;
		}
		if ($imageSeo) {
			return $imageSeo;
		}
	}
	public static function updateBox($imageUrl, $viId, $enId, $modelName)
	{
		$updateVi = $modelName::find($viId);
		$updateEn = $modelName::find($enId);
		$updateVi->update(array('image_url' => $imageUrl));
		$updateEn->update(array('image_url' => $imageUrl));
		return $viId;
	}
}