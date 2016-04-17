<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('username', 'email', 'password', 
		'fullname', 'status', 'phone', 'role_user_id', 'address', 'type');
    protected $dates = ['deleted_at'];

    public static function getRule($input, $user = null)
    {
    	$rules = ['fullname' => 'required'];
    	if ($user) {
    		$unique = array('phone', 'email');
    		foreach ($unique as $value) {
    			if ($user->$value != $input[$value]) {
    				$rules[$value] = 'required|max:256|unique:users';
    			}
    		}
			return $rules;
    	}
    	return $rules = array(
			'password' => 'required|max:256|min:6',
			'email' => 'required|max:256|email|unique:users',
			'phone' => 'required|max:256|unique:users',
			'fullname' => 'required|max:256',
			'address' => 'max:256',
		);
    }

}
