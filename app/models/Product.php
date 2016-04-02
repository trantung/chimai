<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Product extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'products';
	protected $fillable = ['name', 'image_url', 'weight_number', 'status', 'code', 'status',
		'slug', 'material_id', 'origin_id', 'surface_id', 'unit_id', 'description', 'language',
		'price', 'price_old', 'qty', 'qty_import', 'qty_export', 'qty_error', 'qty_back'];
	protected $dates = ['deleted_at'];
	
	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);

	public function productCategories() 
	{
		return $this->belongsToMany('Category', 'category_products', 'product_id', 'category_id');

	}
	public function productSizes() 
	{
		return $this->belongsToMany('Size', 'size_products', 'product_id', 'size_id');

	}
	public function productSurfaces() 
	{
		return $this->belongsToMany('Surface', 'surface_products', 'product_id', 'surface_id');

	}

}