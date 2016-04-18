<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrderProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'order_products';
    protected $fillable = ['order_id', 'product_id', 'price', 'qty', 'amount', 'surface_id', 'size_id', 'color_id'];
    protected $dates = ['deleted_at'];

}