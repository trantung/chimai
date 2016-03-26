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
        return array_values($commonModel)[0];
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

}