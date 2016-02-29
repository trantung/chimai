<?php
class Common {

	public static function getArrayLang()
	{
		$lang = array(VI => VI, EN => EN, FR=>FR, CN => CN);
		return $lang;
	}

	public static function getDefaultArrayBox($input)
	{
		$default = array(
			'status' => $input['status'],
			'position' => $input['position'],
			'weight_number' => $input['weight_number']
		);
		return $default;
	}
	public static function getDefaultArrayProduct()
	{
		$default = array(
			'status' => $input['status'],
			'position' => $input['position'],
			'weight_number' => $input['weight_number']
		);
		return $default;
	}
	public static function getDefaultArrayNew()
	{
		$default = array(
			'status' => $input['status'],
			'position' => $input['position'],
			'weight_number' => $input['weight_number']
		);
		return $default;
	}
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
		$position = array(MENU => 'Menu', CONTENT => 'Content', FOOTER => 'Footer');
		return $position;
	}
	public static function getStatus()
	{
		$array = [ACTIVE => 'Hiển thị', INACTIVE => 'Ẩn'];
		return $array;
	}

	public static function getInputLanguage($lang, $input)
	{
		$name = array();
		if ($lang == VI) {
			$name['name_menu'] = $input['name_menu'];
			$name['name_content'] = $input['name_content'];
			return $name;
		}
		if ($lang == EN) {
			$name['name_menu'] = $input['en_name_menu'];
			$name['name_content'] = $input['en_name_content'];
			return $name ;
		}
		return array();
	}

	public static function getDefaultValue($modelName, $input)
	{	
		if (in_array($modelName, ['BoxType', 'BoxCollection', 'BoxProduct'])) {
			return self::getDefaultArrayBox($input);
		}
		if (in_array($modelName, ['Product'])) {
			return self::getDefaultArrayProduct($input);
		}
	}
	public static function getArrayLangNotVi()
	{
		$lang = array(EN => EN, FR=>FR, CN => CN);
		return $lang;
	}
	public static function createBox($input, $modelName)
	{
		//get default array
		$default = self::getDefaultValue($modelName, $input);
		if ($input['image_url']) {
			unset($input['image_url']);
		}
		//get viInput and enInput, frInput...
		$viInput = array();
		$foreignInput = array();
		$commonInput = array_diff($input, $default);
		$getArrayLangNotVi = self::getArrayLangNotVi();
		foreach ($commonInput as $key => $value) {
			//get enInput, frInput..
			$strLang = substr($key, 0, 2);
			if (in_array($strLang, $getArrayLangNotVi)) {
				$foreignInput[$strLang][substr($key, 3)] = $value;
			}
			else {
				//get viInput
				$viInput[$key] = $value;
			}
		}
		//create vi ->id
		$id = self::create($modelName, $viInput, $default);
		//create foreign
		foreach ($foreignInput as $keyForeign => $valueForeign) {
			$idRelates[$keyForeign] = self::create($modelName, $foreignInput[$keyForeign], $default);
		}
		//create BoxCommon
		self::createBoxCommon($id, $idRelates, $modelName, $default);
		//upload image with viId, enId...
		$imageUrl = Common::uploadImage($id, UPLOADIMG, 'image_url', $modelName);
		//update box with image name
		$update = Common::updateImageBox($imageUrl, $id, $idRelates, $modelName);
		return $id;
	}
	public static function create($modelName, $input, $default)
	{
		$data = array_merge($input, $default);
		$id = $modelName::create($data)->id;
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
	public static function updateImageBox($imageUrl, $viId, $idRelates, $modelName)
	{
		$viId = $modelName::find($viId)->update(array('image_url' => $imageUrl));;
		foreach ($idRelates as $key => $value) {
			$modelName::find($value)->update(array('image_url' => $imageUrl));
		}
		return $viId;
	}

	public static function createBoxCommon($id, $arrayRelateId, $modelName, $default)
	{	
		foreach ($arrayRelateId as $key => $value) {
			$input['model_id'] = $id;
			$input['model_name'] = $modelName;
			$input['relate_id'] = $value;
			$input['relate_name'] = $modelName;
			$listId[] = BoxCommon::create(array(
				'model_id' => $id,
				'model_name' => $modelName,
				'relate_id' => $value,
				'relate_name' => $modelName,
				'position' => $default['position'],
				'status' => $default['status'],
				'weight_number' => $default['weight_number'],
			));
		}
		return $listId;
	}	

	public static function getObjectByLang($modelName, $id, $lang)
	{
		if ($lang == VI) {
			$ob = $modelName::find($id);
			// dd($ob);
			return $ob;
		}

		if ($lang == EN) {
			$relate = BoxCommon::where('model_id', $id)
				->where('model_name', $modelName)
				->where('relate_name', $modelName)
				->first();
			if ($relate) {
				$relateId = $relate->relate_id;
				$ob = $modelName::find($relateId);
				return $ob;
			}
			return null;
		}
	}

	public static function updateBox($modelName, $id, $input)
	{
		$relate = $relate = BoxCommon::where('model_id', $id)
			->where('model_name', $modelName)
			->where('relate_name', $modelName)
			->first();
		if ($relate) {
			$enId = $relate->relate_id;
		}
	}

}


