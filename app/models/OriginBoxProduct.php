<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OriginBoxProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'origin_box_products';
    protected $fillable = ['origin_id', 'box_product_id'];
    protected $dates = ['deleted_at'];

    public function boxProduct() 
    {
        return $this->belongsTo('BoxProduct', 'box_product_id', 'id');
    }

    public function origin() 
    {
        return $this->belongsTo('Origin', 'origin_id', 'id');
    }
}