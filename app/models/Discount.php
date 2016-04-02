<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Discount extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'discounts';
    protected $fillable = ['role_user_id', 'description', 'value'];
    protected $dates = ['deleted_at'];

}