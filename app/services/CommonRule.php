<?php
class CommonRule {

	public static function getRules($modelName)
	{
		switch ($modelName) {
			case 'BoxType':
				return self::getRulesRequired(['name_menu']);
				break;
			case 'BoxCollection':
				return self::getRulesRequired(['name_menu']);
				break;
			case 'BoxProduct':
				return self::getRulesRequired(['name_menu']);
				break;
			case 'Contact':
				return ['name' => 'required', 'email' => 'required', 'phone' => 'required'];
				break;
			
			default:
				# code...
				break;
		}
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