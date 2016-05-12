<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class OrderDiscount extends Eloquent
{
    protected $table = 'order_discounts';
    protected $fillable = ['order_id', 'discount_id'];

}