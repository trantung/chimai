<?php
class CommonParent
{
	public static function updateCommonParent($table, $modelName, $modelId, $foreignInput)
	{
		$idRelates = $table::where('model_name', $modelName)
			->where('relate_name', $modelName)
			->where('model_id', $modelId)
			->groupBy('relate_id')
			->lists('relate_id');
		foreach ($idRelates as $key => $idRelate) {
			$relate[$key] = $modelName::find($idRelate);
			$relateUpdate[$key] = array_merge($foreignInput[$relate[$key]->language], []);
			$relate[$key]->update($relateUpdate[$key]);
		}
		return $idRelates;
	}

	public static function getCommonSlug($table, $modelName, $modelId)
	{
		$slug = array();
		$idRelates = $table::where('model_name', $modelName)
			->where('relate_name', $modelName)
			->where('model_id', $modelId)
			->groupBy('relate_id')
			->lists('relate_id');
		foreach ($idRelates as $key => $idRelate) {
			$slug[$key] = $modelName::find($idRelate)->slug;
		}
		return $slug;
	}

	public static function updateCommonSlug($modelName, $idRelates, $slugs)
	{
		if($slugs) {
			foreach ($idRelates as $k => $v) {
				$modelName::find($v)->update(array('slug' => $slugs[$k]));
			}	
		}
	}

}