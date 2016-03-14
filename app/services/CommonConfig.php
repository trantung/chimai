<?php
class CommonConfig {

	public static function getConfigCode($type, $lang = VI)
	{
		$code = ConfigCode::where('language', $lang)
						->where('type', $type)
						->first();
		if($code) {
			return $code->code;
		}
		return null;
	}

}