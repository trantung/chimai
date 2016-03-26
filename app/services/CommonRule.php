<?php
class CommonRule {

	public static function checkRules($input, $modelName)
	{
		if(in_array($modelName, ['ProductCreate', 'ProductEdit'])) {
			if(!isset($input['category_id'])) {
				$input['category_id'] = array();
			}
			if(!isset($input['size_id'])) {
				$input['size_id'] = array();
			}
			$rules = CommonRule::getRules($modelName, $input);
		} else if(in_array($modelName, ['BoxPdfCreate', 'BoxPdfEdit', 'BoxVideoCreate', 'BoxVideoEdit', 'BoxShowRoomCreate', 'BoxShowRoomEdit'])) {
			if(!isset($input['box_collection_id'])) {
				$input['box_collection_id'] = array();
			}
			$rules = CommonRule::getRules($modelName);
		} else if (in_array($modelName, ['BoxProductCreate', 'BoxProductEdit'])) {
			if(!isset($input['origin_id'])) {
				$input['origin_id'] = array();
			}
			$rules = CommonRule::getRules($modelName);
		} else {
			$rules = CommonRule::getRules($modelName);
		}
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return $validator;
        }
        return null;
	}

	public static function getRules($modelName, $input = null)
	{
		if (in_array($modelName, ['BoxTypeCreate', 'BoxCollectionCreate', 'BoxPromotionCreate'])) {
			$array = self::getRulesRequired(['name_menu']);
			$arrayRule = array_merge($array, ['name_menu' => 'required', 'weight_number' => 'array_number', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if (in_array($modelName, ['BoxTypeEdit', 'BoxCollectionEdit', 'BoxPromotionEdit'])) {
			$array = self::getRulesRequired(['name_menu']);
			$arrayRule = array_merge($array, ['name_menu' => 'required', 'weight_number' => 'array_number']);
			return $arrayRule;
		}
		if (in_array($modelName, ['BoxPdfCreate', 'BoxVideoCreate', 'BoxShowRoomCreate'])) {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'weight_number' => 'integer|min:0', 'box_collection_id' => 'required', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if (in_array($modelName, ['BoxPdfEdit', 'BoxVideoEdit', 'BoxShowRoomEdit'])) {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'weight_number' => 'integer|min:0', 'box_collection_id' => 'required']);
			return $arrayRule;
		}
		if ($modelName == 'BoxProductCreate') {
			$array = self::getRulesRequired(['name_menu']);
			$arrayRule = array_merge($array, ['name_menu' => 'required', 'weight_number' => 'array_number', 'origin_id' => 'required', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if ($modelName == 'BoxProductEdit') {
			$array = self::getRulesRequired(['name_menu']);
			$arrayRule = array_merge($array, ['name_menu' => 'required', 'weight_number' => 'array_number', 'origin_id' => 'required']);
			return $arrayRule;
		}
		if ($modelName == 'Contact') {
			return ['name' => 'required', 'email' => 'required', 'phone' => 'required'];
		}
		if (in_array($modelName, ['Origin', 'Surface', 'Size', 'Material', 'Category'])) {
			$array = self::getRulesRequired(['name']);
			$arrayRule = array_merge($array, ['name' => 'required', 'weight_number' => 'integer|min:0']);
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
			$arrayRule = array_merge($array, ['name' => 'required', 'box_type_id' => 'required', 'weight_number' => 'integer|min:0', 'sapo' => 'required|max:500']);
			return $arrayRule;
		}
		if ($modelName == 'TypeNewEdit') {
			$array = self::getRulesRequired(['name', 'sapo']);
			$arrayRule = array_merge($array, ['name' => 'required', 'box_type_id' => 'required', 'weight_number' => 'integer|min:0', 'sapo' => 'required|max:500']);
			return $arrayRule;
		}
		if ($modelName == 'ProductCreate') {
			$array = self::getRulesRequired(['name', 'price', 'price_old']);
			$arrayRule = array_merge($array, ['name' => 'required', 'weight_number' => 'integer|min:0', 'price' => 'required|integer|min:0', 'price_old' => 'integer|min:0|greater_than:price,' . $input['price'], 'category_id' => 'required', 'size_id' => 'required', 'image_url' => 'required|image']);
			return $arrayRule;
		}
		if ($modelName == 'ProductEdit') {
			$array = self::getRulesRequired(['name', 'price', 'price_old'], $input);
			$arrayRule = array_merge($array, ['name' => 'required', 'weight_number' => 'integer|min:0', 'price' => 'required|integer|min:0', 'price_old' => 'integer|min:0|greater_than:price,' . $input['price'], 'category_id' => 'required', 'size_id' => 'required']);
			return $arrayRule;
		}

		return [];
	}

	// fields = array()
	public static function getRulesRequired($fields, $input = null)
	{
		$array = [];
		$arrayLang = Common::getArrayLangNotVi();
		if($fields) {
			foreach($fields as $value) {
				$array = array_merge($array, [$value => 'required']);
				foreach($arrayLang as $keyLang => $singLang) {
					if($value == 'price') {
						$array[$singLang.'_price'] = 'required|integer|min:0';	
					} else if($value == 'price_old') {
						$array[$singLang.'_price_old'] = 'integer|min:0|greater_than:'.$singLang.'_'.'price,' . $input[$singLang.'_price'];
					} else if($value == 'sapo') {
						$array[$singLang.'_sapo'] = 'required|max:500';
					} else {
						$array[$singLang.'_'.$value] = 'required';
					}
				}
			}
		}
		return $array;
	}

}
