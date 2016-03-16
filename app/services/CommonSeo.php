<?php
use Carbon\Carbon;
class CommonSeo
{
	public static function createSeo($modelName, $modelId)
	{
		$input = self::getInputSeo();
		$input['model_name'] = $modelName;
		$input['model_id'] = $modelId;
		$id = AdminSeo::create($input)->id;
		return $id;
	}

	public static function updateSeo($modelName, $modelId)
	{
		$input = self::getInputSeo();
		$seo = self::getIdSeo($modelId, $modelName);
		if (!$seo) {
			$id = self::createSeo($modelName, $modelId);
			return $id;
		}
		AdminSeo::find($seo->id)->update($input);
	}

	public static function deleteSeo($modelId, $modelName)
	{
		$seo = self::getIdSeo($modelId, $modelName);
		AdminSeo::find($seo->id)->delete();
	}

	public static function getIdSeo($modelId, $modelName)
	{
		return $seo = AdminSeo::where('model_name', $modelName)
						->where('model_id', $modelId)->first();
	}

	public static function getInputSeo()
	{
		$input = Input::only(
				'title_site',
				'description_site',
				'keyword_site',
				'header_script',
				'footer_script'
			);
		return $input;
	}

	public static function getMetaSeo($modelName, $modelId = null)
    {
        if(!$modelId) {
            $seoMeta = AdminSeo::where('model_name', $modelName)
                    ->first();
            return $seoMeta;
        }
        $seoMeta = AdminSeo::where('model_name', $modelName)
                ->where('model_id', $modelId)
                ->first();
        if($seoMeta) {
	        return $seoMeta;
        }
        return null;
    }

}