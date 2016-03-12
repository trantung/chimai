<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ConfigCode extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'contacts';
	protected $fillable = ['type', 'code'];
	protected $dates = ['deleted_at'];

}
