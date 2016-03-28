<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class SurfaceProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'surface_products';
    protected $fillable = ['product_id', 'surface_id'];
    protected $dates = ['deleted_at'];
}