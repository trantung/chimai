<?php
class CommonRule {

	public static function checkRules($input, $modelName)
	{
		$rules = CommonRule::getRules($modelName);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return $validator;
        }
        return null;
	}

	public static function getRules($modelName)
	{
		if (in_array($modelName, ['BoxType', 'BoxCollection', 'BoxProduct', 'BoxPromotion'])) {
			$array = self::getRulesRequired(['name_menu']);
			$arrayRule = array_merge($array, ['weight_number' => 'array_number']);
			return $arrayRule;
		}
		if ($modelName == 'Contact') {
			return ['name' => 'required', 'email' => 'required', 'phone' => 'required'];
		}
		if ($modelName == 'Origin') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required']);
			return $arrayRule;
		}
		if ($modelName == 'AdminSlideCreate') {
			return ['type' => 'required', 'weight_number' => 'integer|min:0', 'image_url' => 'required|image'];
		}
		if ($modelName == 'AdminSlideEdit') {
			return ['type' => 'required', 'weight_number' => 'integer|min:0'];
		}
		if ($modelName == 'AdminVideo') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type' => 'required', 'weight_number' => 'integer|min:0', 'link' => 'required|url|youtube_url']);
			return $arrayRule;
		}
		if ($modelName == 'AdminPdfCreate') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type' => 'required', 'weight_number' => 'integer|min:0', 'image_url' => 'required|image', 'filePdf' => 'required|mimes:pdf']);
			return $arrayRule;
		}
		if ($modelName == 'AdminPdfEdit') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type' => 'required', 'weight_number' => 'integer|min:0']);
			return $arrayRule;
		}
		if ($modelName == 'AdminImageCreate') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type' => 'required', 'weight_number' => 'integer|min:0', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if ($modelName == 'AdminImageEdit') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type' => 'required', 'weight_number' => 'integer|min:0']);
			return $arrayRule;
		}
		if ($modelName == 'AdminNewCreate') {
			$array = self::getRulesRequired(['name', 'sapo', 'description']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type_new_id' => 'required', 'weight_number' => 'integer|min:0', 'sapo' => 'required|max:500', 'description' => 'required', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if ($modelName == 'AdminNewEdit') {
			$array = self::getRulesRequired(['name', 'sapo', 'description']);
			$arrayRule = array_merge($array, ['name' => 'required', 'type_new_id' => 'required', 'weight_number' => 'integer|min:0', 'sapo' => 'required|max:500', 'description' => 'required']);
			return $arrayRule;
		}
		if ($modelName == 'TypeNewCreate') {
			$array = self::getRulesRequired(['name', 'sapo']);
			$arrayRule = array_merge($array, ['name' => 'required', 'box_type_id' => 'required', 'weight_number' => 'integer|min:0', 'sapo' => 'required|max:500', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if ($modelName == 'TypeNewEdit') {
			$array = self::getRulesRequired(['name', 'sapo']);
			$arrayRule = array_merge($array, ['name' => 'required', 'box_type_id' => 'required', 'weight_number' => 'integer|min:0', 'sapo' => 'required|max:500']);
			return $arrayRule;
		}
		if ($modelName == 'Category') {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'weight_number' => 'integer|min:0']);
			return $arrayRule;
		}

		return [];
	}

	// fields = array()
	public static function getRulesRequired($fields)
	{
		$array = [];
		$arrayLang = Common::getArrayLangNotVi();
		if($fields) {
			foreach($fields as $value) {
				$array = array_merge($array, [$value => 'required']);
				foreach($arrayLang as $keyLang => $singLang) {
					$array[$singLang.'_'.$value] = 'required';
				}
			}
		}
		return $array;
	}

}