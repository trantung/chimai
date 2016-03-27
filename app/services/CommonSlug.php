<?php
class CommonSlug
{
	public static function getSlugByLanguage($data, $modelName, $lang = null)
	{
		if ($lang) {
			return $modelName::find($data->model_id);
		}
		if (getLanguage() == VI) {
			return $modelName::find($data->model_id);
		}
		if (getLanguage() != VI) {
			$ob = $modelName::find($data->relate_id);
			if ($ob->language == getLanguage()) {
				return $ob;
			}
		}
	}
	public static function getSlugByModel($data, $modelName, $lang = null)
	{
		return $modelName::find($data->id);

	}
	public static function getOriginByLanguage()
	{
		$listOrigins = AdminLanguage::where('model_name', 'Origin')
			->where('status', ACTIVE)
			->orderBy('weight_number', 'asc');
		if (getLanguage() == VI) {
			$listOriginId = $listOrigins->groupBy('model_id')->lists('model_id');
			return Origin::whereIn('id', $listOriginId)->lists('name', 'id');
		}
		if (getLanguage() != VI) {
			$listOriginId = $listOrigins->groupBy('relate_id')
				->lists('relate_id');
			return Origin::whereIn('id', $listOriginId)
				->where('language', getLanguage())->lists('name', 'id');
		}
	}

	public static function getCollectionContain($slug)
	{
		$collection = BoxCollection::findBySlug($slug);
		$boxPdf = self::addModelNameObject($collection->boxPdfs, 'BoxPdf');
		$boxVideo = self::addModelNameObject($collection->boxVideos, 'boxVideo');
		$boxShowRoom = self::addModelNameObject($collection->boxShowRooms, 'boxShowRoom');
		return [$boxPdf, $boxVideo, $boxShowRoom];
	}
	
	public static function addModelNameObject($ob, $modelName)
	{
		foreach ($ob as $key => $value) {
			$value->model_name = $modelName;
		}
		return $ob;
	}
	public static function getNameObjectByLanguage($box)
	{
		if($box->language == getLanguage()) {
			return $box->name;
		}
		
	}
	public static function getImageUrlByModel($modelName, $data)
	{
		// UPLOADIMG . '/BoxType/' . $boxVi->id . '/' . $boxVi->image_url
		$ob = self::getSlugByLanguage($data, $modelName, VI);
		$imageUrl = 'images/'. $modelName . '/' . $ob->id .'/'. $ob->image_url;
		return $imageUrl;
	}
	public static function getImageUrlNotBox($modelName, $data)
	{
		if (getLanguage() == VI) {
			$imageUrl = UPLOADIMG . '/'. $modelName .'/' . $data->id . '/' . $data->image_url;
		} else {
			$obModel = AdminLanguage::where('model_name', $modelName)
				->where('relate_id', $data->id)
				->where('status', ACTIVE)
				->first();
			if ($obModel) {
				$dataModel = $modelName::find($obModel->model_id);
				$imageUrl = UPLOADIMG . '/'. $modelName .'/' . $dataModel->id . '/' . $dataModel->image_url;
			}
		}
		return $imageUrl;
	}
	// duong dan slug, bo vi/ tren duong dan khi ngon ngu = VI
	public static function getUrlSlug($slug, $slugChild = NULL)
	{
		if(isset($slugChild)) {
			return url(LaravelLocalization::setLocale() . '/' . $slug . '/' . $slugChild);
		} else {
			return url(LaravelLocalization::setLocale() . '/' . $slug);	
		}
	}

}