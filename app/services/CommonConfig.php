<?php
class CommonConfig {

	public static function getConfigCode($type, $lang = VI)
	{
		$code = ConfigCode::where('language', $lang)
						->where('type', $type)
						->first();
		if(isset($code)) {
			return $code->code;
		}
		return null;
	}

	public static function getCode($type)
	{
		$lang = getLanguage();
		$cacheKey = 'ConfigCode_'.$type.'_'.$lang;
		if (Cache::has($cacheKey)) {
            $code = Cache::get($cacheKey);
        } else {
        	$code = ConfigCode::where('language', $lang)
						->where('type', $type)
						->first();
            Cache::put($cacheKey, $code, CACHETIME);
        }
		if(isset($code)) {
			return $code->code;
		}
		return null;
	}

}
