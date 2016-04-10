<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class TypeNew extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
    protected $table = 'type_news';
    protected $fillable = ['name', 'slug', 'weight_number', 'status', 'image_url', 
        'language', 'box_type_id', 'sapo', 'description', 'start_date', 'count_view'];
    protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

    public function news()
    {
        return $this->hasMany('AdminNew', 'type_new_id', 'id');
    }

    public function boxType()
    {
        return $this->belongsTo('BoxType', 'box_type_id', 'id');
    }
}