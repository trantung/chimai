<?php
class CommonRule {

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