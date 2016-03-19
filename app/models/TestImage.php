<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TestImage extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'test_images';
    protected $fillable = ['name', 'image_url', 'weight_number'];
    protected $dates = ['deleted_at'];

}