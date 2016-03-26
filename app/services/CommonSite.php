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
        $array = ['BoxType', 'BoxProduct', 'BoxCollection', 'Origin', 'BoxPdf',
            'BoxVideo', 'BoxShowRoom', 'TypeNew'
        ];
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
        return $commonModel[0];
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
        $currentUrl = URL::current();
        $currentUri = $_SERVER['REQUEST_URI'];
        $currentSegment1 = Request::segment(1);
        if(isset($currentSegment1)) {
            $currentSegment1 = substr($currentUri, 4);
            if($currentLang == $lang) {
                return $currentUrl;
            }
            $obj = self::getObjectBySlug($currentSegment1);
            if(in_array($obj['model_name'], ['BoxType', 'BoxProduct', 'BoxCollection', 'BoxPdf',
            'BoxVideo', 'BoxShowRoom'])) {
                if($currentLang == VI) {
                    $ids = self::getListBoxCommon($obj['model_name'], $obj['model_object']->id);
                } else {
                    $ids = BoxCommon::where('model_name', $obj['model_name'])
                                ->where('relate_id', $obj['model_object']->id)
                                ->lists('model_id');
                    if($lang == VI) {
                        $ids = $ids;
                    } else {
                        $idVi = $ids[0];
                        $ids = self::getListBoxCommon($obj['model_name'], $idVi);
                    }

                }
                $data = $obj['model_name']::where('language', $lang)->whereIn('id', $ids)->first();
                $slug = $data->slug;
                return url($lang .'/'. $slug);
            }


        }

    }

    public static function getListBoxCommon($modelName, $modelId)
    {
        $ids = BoxCommon::where('model_name', $modelName)
                            ->where('model_id', $modelId)
                            ->groupBy('relate_id')->lists('relate_id');
        return $ids;
    }

}