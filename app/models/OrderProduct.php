<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrderProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'order_products';
    protected $fillable = ['order_id', 'product_id', 'price', 'qty', 'amount'];
    protected $dates = ['deleted_at'];

}