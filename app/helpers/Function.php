<?php

use Jenssegers\Agent\Agent;

function getRole($roleId) {
	$role = array(
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
		SERVICE => 'SERVICE',
		WRITER => 'WRITER',
	);
	return $role[$roleId];
}

function selectRoleId()
{
	return array(
		'' => '-- Lựa chọn',
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
		SERVICE => 'SERVICE',
		WRITER => 'WRITER',
	);
}
function textPlaceHolder($input, $isSeoMeta = NULL, $id = NULL)
{
	if(!Admin::isSeo() || $isSeoMeta) {
		return array('placeholder' => $input, 'class' => 'form-control', 'rows' => 4,'id' => $id);
	} else {
		return array('placeholder' => $input, 'class' => 'form-control', 'rows' => 4, 'readonly' => true, 'id' => $id);
	}
}

function getDevice()
{
	//agent check tablet mobile desktop
	$agent = new Agent();
	if($agent->isMobile() || $agent->isTablet()) {
		return MOBILE;
	} else {
		return COMPUTER;
	}
}

function getIpAddress()
{
	$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
}

//add time to filename
function changeFileNameImage($filename)
{
	$file = getFilename($filename);
	$str = strtotime(date('Y-m-d H:i:s'));
	$fileNameAfter = $file. '-' . $str;
	$extension = getExtension($filename);
	return $fileNameAfter.'.'.$extension;
}

function getNameDevice($deviceId)
{
	if ($deviceId == MOBILE) {
		return SMART_DEVICE;
	}
	if ($deviceId == COMPUTER) {
		return COMPUTER_DEVICE;
	}
}
// show 0 for null
function getZero($number = null)
{
	if($number != '') {
		return $number;
	}
	return 0;
}
//get extension from filename
function getExtension($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_EXTENSION);
	}
	return null;
}
//get filename from filename
function getFilename($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_FILENAME);
	}
	return null;
}
//cut trim text
function limit_text($text, $len) {
    if (strlen($text) < $len) {
        return $text;
    }
    $text_words = explode(' ', $text);
    $out = null;
    foreach ($text_words as $word) {
        if ((strlen($word) > $len) && $out == null) {

            return substr($word, 0, $len) . "...";
        }
        if ((strlen($out) + strlen($word)) > $len) {
            return $out . "...";
        }
        $out.=" " . $word;
    }
    return $out;
}

//kich hoat or chua kich hoat
function checkActiveUser($status)
{
	if($status == ACTIVE)
		return ACTIVEUSER;
	else
		return INACTIVEUSER;
}
// đã duyệt or chưa duyệt
function checkApproveOrReject($status)
{
	if($status == ACTIVE)
		return 'Đã duyệt';
	else
		return 'Chưa duyệt';
}

function selectActive()
{
	return array(
		ACTIVE => ACTIVEUSER,
		INACTIVE => INACTIVEUSER,
	);
}

function getStatusSeoParent($input, $model_name){
	$seo = AdminSeo::where('model_name', $model_name)
		->where('model_id', $input->id)
		->first();
		return checkActiveUser($seo->status_seo);

}

function convert_string_vi_to_en($str){
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}

function getSlideType($typeId) {
	$data = array(
		SLIDE_BANNER_VALUE => SLIDE_BANNER,
		SLIDE_PARTNER_VALUE => SLIDE_PARTNER,
	);
	return $data[$typeId];
}

function getYouTubeVideoId($url)
{
    $video_id = false;
    $url = parse_url($url);
    if (strcasecmp($url['host'], 'youtu.be') === 0)
    {
        #### (dontcare)://youtu.be/<video id>
        $video_id = substr($url['path'], 1);
    }
    elseif (strcasecmp($url['host'], 'www.youtube.com') === 0)
    {
        if (isset($url['query']))
        {
            parse_str($url['query'], $url['query']);
            if (isset($url['query']['v']))
            {
                #### (dontcare)://www.youtube.com/(dontcare)?v=<video id>
                $video_id = $url['query']['v'];
            }
        }
        if ($video_id == false)
        {
            $url['path'] = explode('/', substr($url['path'], 1));
            if (in_array($url['path'][0], array('e', 'embed', 'v')))
            {
                #### (dontcare)://www.youtube.com/(whitelist)/<video id>
                $video_id = $url['path'][1];
            }
        }
    }
    return $video_id;
}

function getFullPriceInVnd($number)
{
    if ($number > 0)
        $text = number_format($number, 0, ",", ".");
    else
        $text = 0;

    return $text;
}
function getLanguage()
{
	$lang = LaravelLocalization::setLocale();
	if ($lang == NULL || $lang == VI) {
		return VI;
	} else {
		return $lang;
	}
}
function getSlug()
{
	$currentUri = $_SERVER['REQUEST_URI'];
	$array = explode('/', $currentUri);
	$array2 = explode('?', end($array));
	return $array2[0];
}
// check 1 hay 2 slug
// false: 1 slug, true: 2 slug
function checkSlug()
{
	$currentUri = $_SERVER['REQUEST_URI'];
	$array = explode('/', $currentUri);
	$end = end($array);
	$count = count($array);
	// dd($array);
	if($count > 2) {
		if(in_array($array[count($array)-2], Common::getArrayLang())) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
function getQtyProduct($qty)
{
	if ($qty > 0) {
		return trans('captions.instock');
	}
	return trans('captions.notinstock');
}

function show_date_vn()
{
    $day_array = array(
        'Monday' => 'Thứ hai',
        'Tuesday' => 'Thứ ba',
        'Wednesday' => 'Thứ tư',
        'Thursday' => 'Thứ năm',
        'Friday' => 'Thứ sáu',
        'Saturday' => 'Thứ bảy',
        'Sunday' => 'Chủ nhật',
    );
    $day = $day_array[date('l')];

    // $hour = date('G');
    // if(in_array($hour, array('0','1','2')))
    // {
    //     $apm = 'Khuya';
    // }elseif(in_array($hour, array('3','4','5','6','7','8','9','10')))
    // {
    //     $apm = 'Sáng';
    // }elseif(in_array($hour, array('11','12','13')))
    // {
    //     $apm = 'Trưa';
    // }elseif(in_array($hour, array('14','15','16','17','18')))
    // {
    //     $apm = 'Chiều';
    // }elseif(in_array($hour, array('19','20','21','22','23')))
    // {
    //     $apm = 'Tối';
    // }else{
    //     $apm = '';
    // }
    // echo $day . ', ' . date('d/m/Y - h:i') . ' ' . $apm . ' (GMT +7)';
    echo $day . ', ' . date('d/m/Y | h:i') . ' GMT+7';
}
