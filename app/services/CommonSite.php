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
        // dd(3);
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
		if($currentLang == $lang) {
			return URL::current();
		}
		$endSlug = getSlug();
		$array1 = File::getRequire(base_path().'/app/lang/vi/routes.php');
		$array2 = File::getRequire(base_path().'/app/lang/en/routes.php');
		if (in_array($endSlug, $array1) || in_array($endSlug, $array2)) {
			
			foreach($array1 as $k1 => $v1) {
				if ($endSlug == $v1) {
					// $url = url($lang . '/' . $array2[$k1]);
					$url = self::getUrlLang($lang, $array2[$k1]);
				}
				if ($endSlug == $array2[$k1]) {
					// $url = url($lang . '/' . $v1);
					$url = self::getUrlLang($lang, $v1);
				}
			}
			return $url;
		}

		if(checkSlug() == false) {
			if ($endSlug == '' || in_array($endSlug, Common::getArrayLang())) {
	            // return url($lang);
	            return self::getUrlLang($lang);
	        }
			$obj = self::getObjectBySlug($endSlug);
			if(in_array($obj['model_name'], Common::getArrayBoxCommon())) {
	            return self::getSlugByObject('BoxCommon', $obj, $lang);
			}
	        if (in_array($obj['model_name'], Common::getArrayAdminLanguage())) {
	            return self::getSlugByObject('AdminLanguage', $obj, $lang);
	        }
		} else {
			// product, new
			$obj = self::getObjectBySlug($endSlug);
			//product
			if ($obj['model_name'] == 'Product') {
				//get slug1 with slug2 = getSlug()
				$slug = self::commonSlugByObject('AdminLanguage', $obj, $lang);
				$origin = Origin::find(Product::findBySlug($slug)->origin_id);
				$originSlug = $origin->slug;
				// return url($lang .'/'. $originSlug. '/' . $slug);
				return self::getUrlLang($lang, $originSlug. '/' . $slug);
			}
			//new
			if ($obj['model_name'] == 'AdminNew') {
				//get slug1 with slug2 = getSlug()
				$slug = self::commonSlugByObject('AdminLanguage', $obj, $lang);
				$type_new = TypeNew::find(AdminNew::findBySlug($slug)->type_new_id);
				$type_newSlug = $type_new->slug;
				// return url($lang .'/'. $type_newSlug. '/' . $slug);
				return self::getUrlLang($lang, $type_newSlug. '/' . $slug);
			}
		}
	}
	// bo vi/ tren duong dan khi ngon ngu = VI
	public static function getUrlLang($lang, $url = '')
	{
		if($lang == VI) {
			return url($url);
		} else {
			return url($lang . '/' . $url);
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
        $slug = self::commonSlugByObject($table, $obj, $lang);
        return self::getUrlLang($lang, $slug);
    }
    public static function commonSlugByObject($table, $obj, $lang)
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
        return $slug;
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
    public static function getSurfaceNameProduct($product)
    {
    	$listSize = $product->productSurfaces->lists('name');
    	return $listSize;
    }
 	public static function getCategoryNameProduct($product)
    {
    	$listSize = $product->productCategories->lists('name');
    	return $listSize;
    }
    public static function getClassEnd($key, $data)
    {
    	$total = $data->getTotal();
    	if($total <= FRONENDPAGINATE) {
    		if($key == $total-1) {
    			return 'end';
    		}
    	} else {
			if($key == ceil($total/FRONENDPAGINATE)-1) {
				return 'end';
			}
    	}
		return '';
    }
    public static function getRelateProduct($data)
    {
    	$listProducts = Product::where('material_id', $data->material_id)
    		->where('status', ACTIVE)
    		->where('id', '!=', $data->material_id)
    		->orderBy('weight_number', 'asc')
    		->get();
    	return $listProducts;
    }

}
