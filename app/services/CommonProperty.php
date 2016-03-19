<?php
class CommonProperty extends CommonParent
{
	// public static function getObjectByModelId($modelName, $modelId)
	// {
	// 	$vi = $modelName::find($modelId);
	// 	$listId = AdminLanguage::where('model_name', $modelName)
	// 		->where('model_id', $modelId)->lists('relate_id');
	// 	$en = $modelName::whereIn('id', $listId)->get();
	// 	$array = [0 => $vi, 1 => $en];
	// 	return $array;
	// }
	// public static function getDefaultValue($modelName, $input)
	// {	
	// 	if (in_array($modelName, ['Origin'])) {
	// 		return [];
	// 	}
	// }
	// public static function create($modelName, $input, $default)
	// {
	// 	$data = array_merge($input, $default);
	// 	$id = $modelName::create($data)->id;
	// 	return $id;
	// }
	// public static function createBox($input, $modelName)
	// {
	// 	$default = self::getDefaultValue($modelName, $input);
	// 	$viInput = Common::getInputVi($input, []);
	// 	$foreignInput = Common::getInputForeign($input, []);
	// 	$id = self::create($modelName, $viInput, []);
	// 	//create foreign
	// 	foreach ($foreignInput as $keyForeign => $valueForeign) {
	// 		$foreignInput[$keyForeign]['language'] = $keyForeign;
	// 		$idRelates[$keyForeign] = self::create($modelName, $foreignInput[$keyForeign], []);
	// 	}
	// 	//create BoxCommon
	// 	foreach ($idRelates as $key => $value) {
	// 		$input['model_id'] = $id;
	// 		$input['model_name'] = $modelName;
	// 		$input['relate_id'] = $value;
	// 		$input['relate_name'] = $modelName;
	// 		$listId[] = AdminLanguage::create($input);
	// 	}
	// 	self::createBoxCommon($id, $idRelates, $modelName, $default);

	// }
	// public static function update($modelName, $id, $input)
	// {
	// 	$default = self::getDefaultValue($modelName, $input);
	// 	$viInput = Common::getInputVi($input, []);
	// 	$foreignInput = Common::getInputForeign($input, []);
	// 	Common::update($modelName, $viInput, [], $id);
	// 	CommonParent::updateCommonParent('AdminLanguage', 'Origin', $id, $foreignInput);
	// }
	public static function getDefaultValue($modelName, $input)
	{
		if (in_array($modelName, ['Origin', 'Category', 'Material', 'Size', 'Surface',
			'TypeNew', 'AdminVideo', 'AdminPdf', 'BoxPdf', 'BoxVideo', 'BoxShowRoom', 'AdminImage'])) {

			if($modelName == 'AdminVideo') {
				$input['video_id'] = getYouTubeVideoId($input['link']);
				return array_merge(self::defaultValueProperty($input), 
					['link' => $input['link'], 'video_id' => $input['video_id']]);
			}
			if($modelName == 'AdminPdf') {
				return array_merge(self::defaultValueProperty($input), 
					['image_url' => $input['image_url'], 'file' => $input['filePdf'], 'type' => $input['type']]);
			}
			if($modelName == 'BoxPdf') {
				return array_merge(self::defaultValueProperty($input), 
					['image_url' => $input['image_url']]);
			}
			if($modelName == 'BoxShowRoom') {
				return array_merge(self::defaultValueProperty($input), 
					['image_url' => $input['image_url']]);
			}

			return self::defaultValueProperty($input);
		}
	}

	public static function defaultValueProperty($input)
	{
		return [
				'status' => $input['status'], 
				'weight_number' => $input['weight_number']
			];
	}
}
