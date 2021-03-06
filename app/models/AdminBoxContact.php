<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class AdminBoxContact extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
	protected $table = 'box_contacts';
	protected $fillable = ['name', 'weight_number', 'status', 'slug','weight_number'];
	protected $dates = ['deleted_at'];

	protected $sluggable = array(
		'build_from' => 'name',
		'save_to'    => 'slug',
	);
}