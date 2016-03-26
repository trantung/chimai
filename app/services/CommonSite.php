<?php
class CommonSite
{
	public static function isLogin()
	{
		if (Auth::user()->check()) {
			return true;
		}
		else{
			return false;
		}
	}

	public static function inputRegister()
	{
		$input = Input::except('_token');
		$input['status'] = ACTIVE;
		$input['ip'] = getIpAddress();
		$input['device'] = getDevice();
		return $input;
	}

	// get ip & device to update when user login account
	public static function ipDeviceUser()
	{
		$input = array();
		$input['ip'] = getIpAddress();
		$input['device'] = getDevice();
		return $input;
	}

	public static function getArrayModelSite()
	{
		$array = array_merge(Common::getArrayAdminLanguage(), Common::getArrayBoxCommon());
        unset($array[3]);
        unset($array[2]);
        unset($array[11]);
		return $array;
	}

	public static function getObjectBySlug($slug)
	{
		$arrayBox = self::getArrayModelSite();
		foreach ($arrayBox as $key => $value) {
			$ob = $value::findBySlug($slug);
			if (isset($ob)) {
				$commonModel[$key]['model_object'] = $ob;
				$commonModel[$key]['model_name'] = $value;
			}
		}
        if(isset($commonModel)) {
            return array_values($commonModel)[0];    
        }
        dd(1);
	}

	public static function getDataByModelSlug($object, $modelName, $field, $paginate = null)
	{
		$data = $modelName::where($field, $object['model_object']->id)
				->where('status', ACTIVE)
				->orderBy('weight_number', 'asc');
		if ($paginate) {
			$data = $data->take(TAKE_NUMBER_BOX_TYPE)->get();
		}
		else {
			$data = $data->paginate(FRONENDPAGINATE);
		}
		return $data;
	}

	public static function getUrlByLang($lang)
	{
		$currentLang = getLanguage();
		$endSlug = getSlug();
        if ($endSlug == '' || in_array($endSlug, Common::getArrayLang())) {
            return url($lang);
        }
		if($currentLang == $lang) {
			return URL::current();
		}
		$obj = self::getObjectBySlug($endSlug);
		if(in_array($obj['model_name'], Common::getArrayBoxCommon())) {
            return self::getSlugByObject('BoxCommon', $obj, $lang);
		}
        if (in_array($obj['model_name'], Common::getArrayAdminLanguage())) {
            return self::getSlugByObject('AdminLanguage', $obj, $lang);
        }

	}

	public static function getListIdsCommon($table, $modelName, $modelId)
	{
		$ids = $table::where('model_name', $modelName)
							->where('model_id', $modelId)
							->groupBy('relate_id')->lists('relate_id');
		return $ids;
	}

    public static function getSlugByObject($table, $obj, $lang)
    {
        $currentLang = getLanguage();
        if($currentLang == VI) {
            $ids = self::getListIdsCommon($table, $obj['model_name'], $obj['model_object']->id);
        } else {
            $ids = $table::where('model_name', $obj['model_name'])
                        ->where('relate_id', $obj['model_object']->id)
                        ->lists('model_id');
            if($lang == VI) {
                $ids = $ids;
            } else {
                $idVi = $ids[0];
                $ids = self::getListIdsCommon($obj['model_name'], $idVi);
            }
        }
        $data = $obj['model_name']::where('language', $lang)->whereIn('id', $ids)->first();
        $slug = $data->slug;
        return url($lang .'/'. $slug);
    }

    public static function getOriginByProduct($orginId)
    {
    	$origin = Origin::find($orginId);
    	if(isset($origin)) {
    		return $origin->slug;	
    	}
    	return '';
    }
    public static function getSizeNameProduct($product)
    {
    	$listSize = $product->productSizes->lists('name');
    	return $listSize;
    }
    public static function getMaterialNameProduct($product)
    {
    	$listSize = $product->productMaterials->lists('name');
    	return $listSize;
    }
 	public static function getCategoryNameProduct($product)
    {
    	$listSize = $product->productCategories->lists('name');
    	return $listSize;
    }

}
