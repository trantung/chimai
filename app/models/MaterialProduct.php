<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class MaterialProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'material_products';
    protected $fillable = ['product_id', 'material_id'];
    protected $dates = ['deleted_at'];
}