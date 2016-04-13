<?php
use Carbon\Carbon;
class CommonNormal
{
	public static function delete($id)
	{
		$name = self::commonName();
		$name::find($id)->delete();
	}

	public static function update($id, $input, $modelName = NULL)
	{
		$name = self::commonName();
		if($modelName) {
			$name = $modelName;
		}
		$name::find($id)->update($input);
	}

	public static function create($input, $name = NULL)
	{
		$name = self::commonName($name);
		$id = $name::create($input)->id;
		return $id;
	}

	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(2);
		}
		if ($name == '') {
			return 'AdminNew';
		}
		if ($name == 'user') {
			return 'User';
		}

	}
	public static function commonUpdateManyRelateMany($adminLang, $boxCommon, $viId,
		 $modelName, $viewModelName, $relateModelName, $fieldBoxView, $field)
	{
		$relatePdfId = $adminLang::where('model_name', $modelName)
			->where('model_id', $viId)
			->groupBy('relate_id')->lists('relate_id');
		$pdfRelate = $modelName::whereIn('id', $relatePdfId)->get();
		foreach(Input::get($fieldBoxView) as $valueBox){
			$relateIds = $boxCommon::where('model_name', $viewModelName)
				->where('model_id', $valueBox)
				->groupBy('relate_id')->lists('relate_id');
			$collectionRelate = $viewModelName::whereIn('id', $relateIds)->get();
			foreach ($collectionRelate as $value) {
				foreach ($pdfRelate as $v) {
					if ($v->language = $value->language) {
						$relateModelName::where($fieldBoxView, $valueBox)
							->where($field, $v->id)
							->update([$fieldBoxView => $value->id]);
					}
				}
			}
		}
	}
}