<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BoxShowRoom extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'box_showrooms';
	protected $fillable = [
		'name', 'weight_number', 'status', 'image_url',
		'slug', 'language'
	];
	protected $dates = ['deleted_at'];

	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);

	public function boxCollectionBoxShowRoom()
	{
		return $this->hasMany('CollectionBoxShowRoom', 'box_show_room_id', 'id');
	}
	public function boxCollections() 
	{
		return $this->belongsToMany('BoxCollection', 'collection_box_showrooms', 'box_show_room_id', 'box_collection_id');

	}

}