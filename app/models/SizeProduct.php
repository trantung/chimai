<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class SizeProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'size_products';
    protected $fillable = ['size_id', 'product_id', 'description'];
    protected $dates = ['deleted_at'];
}