<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class AdminPdf extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'pdf';
	protected $fillable = [
		'name', 'weight_number', 'status', 'link', 'image_url', 'type', 'file',
		'slug', 'language'
	];
	protected $dates = ['deleted_at'];

	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);
	public function slide()
	{
		return $this->belongsTo('BoxPdf', 'type', 'id');
	}
	// public function collectionBoxPdf()
	// {
	// 	return $this->hasMany('CollectionBoxPdf', 'pdf_id', 'id');
	// }
	// public function collectionBoxs() 
	// {
	// 	return $this->belongsToMany('BoxCollection', 'collection_box_pdf', 'pdf_id', 'box_collection_id');

	// }

}