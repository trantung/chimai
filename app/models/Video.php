<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Video extends Eloquent implements SluggableInterface
{
    use SoftDeletingTrait;
	use SluggableTrait;
    protected $table = 'video';
    protected $fillable = ['name', 'slug', 'description', 'link', 'type', 'video_id', 'image_url', 'status', 'weight_number', 'language'];
    protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

}