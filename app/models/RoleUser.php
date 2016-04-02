<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RoleUser extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'role_users';
    protected $fillable = ['name', 'description', 'status'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('User', 'role_user_id', 'id');
    }
}