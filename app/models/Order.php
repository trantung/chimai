<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Order extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'orders';
    protected $fillable = ['total', 'discount', 'user_id', 'status'];
    protected $dates = ['deleted_at'];

}