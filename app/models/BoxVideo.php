<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BoxVideo extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'box_videos';
	protected $fillable = [
		'name', 'weight_number', 'status', 'image_url',
		'slug', 'language'
	];
	protected $dates = ['deleted_at'];

	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);

	public function boxCollectionBoxVideo()
	{
		return $this->hasMany('CollectionBoxVideo', 'video_id', 'id');
	}
	public function boxCollections() 
	{
		return $this->belongsToMany('BoxCollection', 'collection_box_videos', 'video_id', 'box_collection_id');

	}

}