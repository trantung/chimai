<?php

use Jenssegers\Agent\Agent;

function getRole($roleId) {
	$role = array(
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
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
	);
}
function textParentCategory($input, $isSeoMeta = NULL, $id = NULL)
{
	if(!Admin::isSeo() || $isSeoMeta) {
		return array('placeholder' => $input, 'class' => 'form-control','id' => $id);
	} else {
		return array('placeholder' => $input, 'class' => 'form-control', 'readonly' => true,'id' => $id);
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
