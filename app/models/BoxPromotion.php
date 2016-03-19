<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BoxPromotion extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
    protected $table = 'box_promotions';
    protected $fillable = [
        'name_menu', 'name_content', 'image_url', 
        'slug', 'name_footer', 'language'
    ];
    protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'name_menu',
        'save_to'    => 'slug',
    );
}