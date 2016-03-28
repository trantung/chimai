<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Material extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'materials';
	protected $fillable = [
		'name', 'weight_number', 'status', 'language', 'slug'
	];
	protected $dates = ['deleted_at'];
	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);
	
}