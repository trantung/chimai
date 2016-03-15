<?php
class Common extends CommonParent
{

	public static function getArrayLang()
	{
		$lang = array(VI => VI, EN => EN);
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
		$array = [INACTIVE => 'Ẩn', ACTIVE => 'Hiển thị'];
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
		if (in_array($modelName, ['BoxType', 'BoxCollection', 'BoxProduct', 'BoxPromotion'])) {
			return self::getDefaultArrayBox($input);
		}
		if (in_array($modelName, ['Product'])) {
			return self::getDefaultArrayProduct($input);
		}
	}
	public static function getArrayLangNotVi()
	{
		$lang = array(EN => EN);
		return $lang;
	}
	public static function getInputVi($input, $default)
	{
		$input = self::getInputCommon($input, $default);
		$viInput = $input[0];
		$viInput['language'] = VI;
		return $viInput;
	}
	public static function getInputForeign($input, $default)
	{
		$input = self::getInputCommon($input, $default);
		return $input[1];
	}
	public static function getInputCommon($input, $default)
	{
		if (isset($input['image_url']) && $input['image_url']) {
			unset($input['image_url']);
		}
		//get viInput and enInput, frInput...
		$viInput = array();
		$foreignInput = array();
		// dd($input);
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
		return [$viInput, $foreignInput];
	}
	public static function createBox($input, $modelName)
	{
		//get default array
		$default = self::getDefaultValue($modelName, $input);
		unset($input['position']);
		unset($input['status']);
		unset($input['weight_number']);
		$viInput = self::getInputVi($input, []);
		$foreignInput = self::getInputForeign($input, []);
		//create vi ->id
		// $viInput['language'] = VI;
		$id = self::create($modelName, $viInput, []);
		//create foreign
		foreach ($foreignInput as $keyForeign => $valueForeign) {
			$foreignInput[$keyForeign]['language'] = $keyForeign;
			$idRelates[$keyForeign] = self::create($modelName, $foreignInput[$keyForeign], []);
		}
		//create BoxCommon
		self::createBoxCommon($id, $idRelates, $modelName, $default);
		//upload image with viId, enId...
		// $imageUrl = Common::uploadImage($id, UPLOADIMG, 'image_url', $modelName);
		$imageUrl = CommonImage::uploadImage($id, UPLOADIMG, 'image_url', $modelName, IMAGE_HOME_WIDTH, IMAGE_HOME_HEIGHT, IMAGE_MODE_FILL);
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

	public static function update($modelName, $input, $default, $id)
	{
		$data = array_merge($input, $default);
		$modelName::find($id)->update($data);
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
		// dd($default);
		foreach ($arrayRelateId as $key => $value) {
			$input['model_id'] = $id;
			$input['model_name'] = $modelName;
			$input['relate_id'] = $value;
			$input['relate_name'] = $modelName;
			foreach($default['position'] as $k => $v) {
				$listId[] = BoxCommon::create(array(
					'model_id' => $id,
					'model_name' => $modelName,
					'relate_id' => $value,
					'relate_name' => $modelName,
					'position' => $default['position'][$k],
					'status' => $default['status'][$k],
					'weight_number' => $default['weight_number'][$k],
				));
			}
			
		}
		return $listId;
	}	

	public static function updateBoxCommon($modelName, $id, $default)
	{	
		$idRelates = self::getIdRelate($modelName, $id);
		// dd($default);
		foreach ($idRelates as $key => $idRelate) {
			foreach($default['position'] as $k => $v) {
				$test = BoxCommon::where('position', $default['position'][$k])
					->where('relate_id', $idRelate)
					->where('model_name', $modelName)
					->first()
					->update(array(
							'weight_number' => $default['weight_number'][$k],
							'status' => $default['status'][$k],
						));
			}
		}
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
	public static function getIdRelate($modelName, $modelId)
	{
		$idRelates = BoxCommon::where('model_name', $modelName)
			->where('relate_name', $modelName)
			->where('model_id', $modelId)
			->lists('relate_id');
		return $idRelates;
	}
	public static function updateBox($modelName, $id, $input)
	{
		$default = self::getDefaultValue($modelName, $input);
		unset($input['position']);
		unset($input['status']);
		unset($input['weight_number']);
		$viInput = self::getInputVi($input, []);
		$foreignInput = self::getInputForeign($input, []);
		$imageUrl = $modelName::find($id)->image_url;
		//update viId
		self::update($modelName, $viInput, [], $id);
		//update boxCommon
		self::updateBoxCommon($modelName, $id, $default);
			//update foreign
		// $idRelates = self::getIdRelate($modelName, $id);
		// foreach ($idRelates as $key => $idRelate) {
		// 	$relate[$key] = $modelName::find($idRelate);
		// 	$relateUpdate[$key] = array_merge($foreignInput[$relate[$key]->language], []);
		// 	$relate[$key]->update($relateUpdate[$key]);
		// }
		$idRelates = CommonParent::updateCommonParent('BoxCommon', $modelName, $modelId, $foreignInput);
		// $imageUrl = Common::uploadImage($id, UPLOADIMG, 'image_url', $modelName, $imageUrl);
		$imageUrl = CommonImage::uploadImage($id, UPLOADIMG, 'image_url', $modelName, IMAGE_HOME_WIDTH, IMAGE_HOME_HEIGHT, IMAGE_MODE_FILL, $imageUrl);
		//update box with image name
		$update = Common::updateImageBox($imageUrl, $id, $idRelates, $modelName);
	}
	public static function deleteBox($modelName, $id)
	{
		$idRelates = self::getIdRelate($modelName, $id);
		foreach ($idRelates as $key => $idRelate) {
			$delete = BoxCommon::where('model_name', $modelName)
				->where('relate_name', $modelName)
				->where('relate_id', $idRelate)
				->delete();
			if ($modelName::find($idRelate)) {
				$modelName::find($idRelate)->delete();
			}
		}
		$modelName::find($id)->delete();
	}

	public static function getValueCommonBox($modelId, $modelName, $position, $field)
	{
		$value = BoxCommon::where('model_id', $modelId)->where('model_name', $modelName)->where('position', $position)->first();
		if($value) {
			return $value->$field;
		}
		return null;
	}
	public static function getNameByBoxCommon($value)
	{
		$ob = $value->model_name;
		if ($box = $ob::find($value->model_id)) {
			return $box->name_menu;
		}
		return null;
	}
	public static function getBoxNameByBoxCommon($value)
	{
		if ($value->model_name == 'BoxType') {
			return 'Box tin tức';
		}
		if ($value->model_name == 'BoxCollection') {
			return 'Box sưu tâp';
		}
		if ($value->model_name == 'BoxProduct') {
			return 'Box sản phẩm';
		}
		if ($value->model_name == 'BoxPromotion') {
			return 'Box khuyến mãi';
		}
		return null;
	}

	public static function getObjectByModelId($modelName, $modelId)
	{
		$boxVi = Common::getObjectByLang($modelName, $modelId, VI);
		$listId = BoxCommon::where('model_name', $modelName)
			->where('model_id', $modelId)->lists('relate_id');
		$boxEn = $modelName::whereIn('id', $listId)->get();
		$array = [0 => $boxVi, 1 => $boxEn];
		return $array;
	}

}


