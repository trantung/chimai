<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductImage extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'product_images';
    protected $fillable = ['name', 'image_url', 'weight_number', 'type', 'product_id', 'status'];
    protected $dates = ['deleted_at'];

}