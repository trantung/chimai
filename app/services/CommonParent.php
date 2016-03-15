<?php
class CommonParent
{
	public static function updateCommonParent($table, $modelName, $modelId, $foreignInput)
	{
		$idRelates = $table::where('model_name', $modelName)
			->where('relate_name', $modelName)
			->where('model_id', $modelId)
			->lists('relate_id');
		foreach ($idRelates as $key => $idRelate) {
			$relate[$key] = $modelName::find($idRelate);
			$relateUpdate[$key] = array_merge($foreignInput[$relate[$key]->language], []);
			$relate[$key]->update($relateUpdate[$key]);
		}
		return $idRelates;
	}
}