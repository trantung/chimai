<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BoxPdf extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'box_pdf';
	protected $fillable = [
		'name', 'weight_number', 'status', 'image_url',
		'slug', 'language'
	];
	protected $dates = ['deleted_at'];

	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);

	public function boxCollectionBoxPdf()
	{
		return $this->hasMany('CollectionBoxPdf', 'pdf_id', 'id');
	}
	public function adminPdfs()
	{
		return $this->hasMany('AdminPdf', 'type', 'id');
	}
	public function boxCollections() 
	{
		return $this->belongsToMany('BoxCollection', 'collection_box_pdf', 'pdf_id', 'box_collection_id');

	}

}