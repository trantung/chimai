<?php
class UserManager
{
	public static function getStatus($value)
	{
		if($value == ACTIVE)
			return ACTIVEUSER;
		return INACTIVEUSER;
	}
	public static function getUsername($value)
	{
		$resultUserName = User::find($value);
		if($resultUserName->uid){
			$input['username'] = $resultUserName->uname;
			$input['type_user'] = TYPEFACEBOOK;
			return  $input;
		}
		if($resultUserName->google_id){
			$input['username'] = $resultUserName->google_name;
			$input['type_user'] = TYPEGOOGLE;
			return  $input;
		}
		$input['username'] = $resultUserName->username;
		$input['type_user'] = TYPESYSTEM;
		return  $input;
	}

	public static function getRoleUserArray()
	{
		$rs = RoleUser::lists('name', 'id');
		if($rs) {
			return $rs;
		}
		return null;
	}

	public static function getRoleUserName($id)
	{
		if($id) {
			$rs = RoleUser::find($id);
			if($rs) {
				return $rs->name;
			}
		}
		return '';
	}
	
}