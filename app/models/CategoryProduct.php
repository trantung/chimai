<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CategoryProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'category_products';
    protected $fillable = ['category_id', 'product_id', 'description'];
    protected $dates = ['deleted_at'];
}