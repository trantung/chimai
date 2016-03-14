<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ConfigCode extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'config_code';
	protected $fillable = ['type', 'code', 'language'];
	protected $dates = ['deleted_at'];

}
