<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrderDiscount extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'order_discounts';
    protected $fillable = ['order_id', 'discount_id'];
    protected $dates = ['deleted_at'];

}