<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BoxProduct extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'box_products';
	protected $fillable = ['name_menu', 'name_content', 'weight_number',
		'status', 'position', 'image_url', 'slug', 'name_footer', 'language'];
	protected $dates = ['deleted_at'];

	protected $sluggable = array(
		'build_from' => 'name_menu',
		'save_to'    => 'slug',
	);
	public function originBoxProduct()
	{
		return $this->hasMany('OriginBoxProduct', 'box_product_id', 'id');
	}
	public function origins() 
	{
		return $this->belongsToMany('Origin', 'origin_box_products', 'box_product_id', 'origin_id');
	}
}