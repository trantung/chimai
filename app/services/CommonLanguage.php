<?php
class CommonLanguage {
	
	public static function getInputCommon($input, $default)
	{
		if ($input['image_url']) {
			unset($input['image_url']);
		}
		//get viInput and enInput, frInput...
		$viInput = array();
		$foreignInput = array();
		$commonInput = array_diff($input, $default);
		$getArrayLangNotVi = Common::getArrayLangNotVi();
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

	public static function createModel($input, $modelName, $inputCommon,
		$imageConfig = array('w' => IMAGE_WIDTH, 'h' => IMAGE_HEIGHT, 'mode' => IMAGE_MODE_FIT))
	{
		//get default array
		// $default = Common::getDefaultValue($modelName, $input);
		$viInput = Common::getInputVi($input, []);
		$foreignInput = Common::getInputForeign($input, []);
		//create vi ->id
		// $viInput['language'] = VI;
		$id = Common::create($modelName, $viInput, []);
		//create foreign
		foreach ($foreignInput as $keyForeign => $valueForeign) {
			$foreignInput[$keyForeign]['language'] = $keyForeign;
			$idRelates[$keyForeign] = Common::create($modelName, $foreignInput[$keyForeign], []);
		}
		//create AdminLanguage
		// self::createModelCommon($id, $idRelates, $modelName, $default);
		self::createModelCommon($id, $idRelates, $modelName, $inputCommon);
		// update common field
		self::updateCommonModel($id, $modelName, $inputCommon, $idRelates);
		//upload image with viId, enId...
		// $imageUrl = Common::uploadImage($id, UPLOADIMG, 'image_url', $modelName);
		$imageUrl = CommonImage::uploadImage($id, UPLOADIMG, 'image_url', $modelName, $imageConfig['w'], $imageConfig['h'], $imageConfig['mode']);
		//update box with image name
		$update = Common::updateImageBox($imageUrl, $id, $idRelates, $modelName);
		//update seo
		CommonSeo::updateSeo($modelName, $id);
		return $id;
	}
	
	public static function createModelCommon($id, $arrayRelateId, $modelName, $default)
	{	
		foreach ($arrayRelateId as $key => $value) {
			$listId[] = AdminLanguage::create(array(
				'model_id' => $id,
				'model_name' => $modelName,
				'relate_id' => $value,
				'relate_name' => $modelName,
				'status' => $default['status'],
				'weight_number' => $default['weight_number'],
			));
		}
		return $listId;
	}	

	public static function updateModelCommon($modelName, $id, $default)
	{	
		$idRelates = self::getIdRelate($modelName, $id);
		foreach ($idRelates as $key => $idRelate) {
			AdminLanguage::where('relate_id', $idRelate)
				->where('model_name', $modelName)
				->first()
				->update(array(
						'weight_number' => $default['weight_number'],
						'status' => $default['status'],
					));
		}
	}

	public static function getObjectByLang($modelName, $id, $lang)
	{
		if ($lang == VI) {
			$ob = $modelName::find($id);
			return $ob;
		}

		if ($lang == EN) {
			$relate = AdminLanguage::where('model_id', $id)
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
		$idRelates = AdminLanguage::where('model_name', $modelName)
			->where('relate_name', $modelName)
			->where('model_id', $modelId)
			->lists('relate_id');
		return $idRelates;
	}

	public static function updateModel($modelName, $id, $input, $inputCommon,
		$imageConfig = array('w' => IMAGE_WIDTH, 'h' => IMAGE_HEIGHT, 'mode' => IMAGE_MODE_FIT))
	{
		// $default = Common::getDefaultValue($modelName, $input);
		$viInput = Common::getInputVi($input, []);
		$foreignInput = Common::getInputForeign($input, []);
		$imageUrl = $modelName::find($id)->image_url;
		//update viId
		Common::update($modelName, $viInput, [], $id);
		//update AdminLanguage
		self::updateModelCommon($modelName, $id, $inputCommon);

		$slugs = CommonParent::getCommonSlug('AdminLanguage', $modelName, $id);

		//update foreign
		$idRelates = self::getIdRelate($modelName, $id);
		foreach ($idRelates as $key => $idRelate) {
			$relate[$key] = $modelName::find($idRelate);
			$relateUpdate[$key] = array_merge($foreignInput[$relate[$key]->language], []);
			if($input['name'] == $relate[$key]->name) {
				$modelName::where('id', $idRelate)->update($relateUpdate[$key]);
			} else {
				$relate[$key]->update($relateUpdate[$key]);	
			}
		}
		// update common field
		self::updateCommonModel($id, $modelName, $inputCommon, $idRelates);
		// $imageUrl = Common::uploadImage($id, UPLOADIMG, 'image_url', $modelName, $imageUrl);
		$imageUrl = CommonImage::uploadImage($id, UPLOADIMG, 'image_url', $modelName, $imageConfig['w'], $imageConfig['h'], $imageConfig['mode'], $imageUrl);
		//update box with image name
		$update = Common::updateImageBox($imageUrl, $id, $idRelates, $modelName);
		//update seo
		CommonSeo::updateSeo($modelName, $id);
		//update slug
		CommonParent::updateCommonSlug($modelName, $idRelates, $slugs);
	}
	public static function deleteModel($modelName, $id)
	{
		$idRelates = self::getIdRelate($modelName, $id);
		foreach ($idRelates as $key => $idRelate) {
			$delete = AdminLanguage::where('model_name', $modelName)
				->where('relate_name', $modelName)
				->where('relate_id', $idRelate)
				->delete();
			if ($modelName::find($idRelate)) {
				$modelName::find($idRelate)->delete();
			}
		}
		$modelName::find($id)->delete();
	}

	public static function getValueCommonModel($modelId, $modelName, $position, $field)
	{
		$value = AdminLanguage::where('model_id', $modelId)->where('model_name', $modelName)->first();
		if($value) {
			return $value->$field;
		}
		return null;
	}

	public static function updateCommonModel($viId, $modelName, $input, $idRelates)
	{
		$viId = $modelName::find($viId)->update($input);;
		foreach ($idRelates as $key => $value) {
			$modelName::find($value)->update($input);
		}
		return $viId;
	}

	public static function getCurrentLang()
	{
		$lang = LaravelLocalization::setLocale();
		if($lang == NULL || $lang == 'vi') {
			return 'vi';
		}
		return $lang;
	}

}
