<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminUnit extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'units';
	protected $fillable = ['name', 'weight_number', 'status', 'language'];
	protected $dates = ['deleted_at'];

}
