<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminImage extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = 'images';
	protected $fillable = [
		'name', 'weight_number', 'status', 'link', 'image_url', 'type', 'file',
		'slug', 'language'
	];
	protected $dates = ['deleted_at'];

	public function slide()
	{
		return $this->belongsTo('BoxShowRoom', 'type', 'id');
	}

}