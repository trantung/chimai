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
		'slug', 'surface_id', 'origin_id', 'material_id', 'unit_id', 'description', 'language',
		'price', 'price_old', 'qty'];
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
	public function productMaterials() 
	{
		return $this->belongsToMany('Material', 'material_products', 'product_id', 'material_id');

	}

}