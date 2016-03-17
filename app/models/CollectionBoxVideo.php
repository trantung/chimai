<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CollectionBoxVideo extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'collection_box_videos';
    protected $fillable = ['video_id', 'box_collection_id'];
    protected $dates = ['deleted_at'];

}