<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Contact extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'contacts';
	protected $fillable = ['type', 'name', 'email', 'phone', 'address', 'message', 'file_upload'];
	protected $dates = ['deleted_at'];

}
